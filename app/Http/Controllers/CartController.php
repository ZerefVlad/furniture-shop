<?php

namespace App\Http\Controllers;


use App\Mail\ManagerEmail;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class CartController extends Controller
{
    protected $session;
    protected $orderService;
    protected $productService;

    public function __construct(Session $session, ProductService $productService)
    {
        $this->session = $session;
        $this->productService = $productService;
    }

    public function addProduct(Request $request)
    {
        $data = $request->all();
        $storedData = $this->session->get('cart_data_products') ?? [];
        $check = true;
        $cartData = [];
        if ($storedData) {
            foreach ($storedData as $key => $item) {
                if ($item['id'] == $data['id']) {
                    $item['quantity'] += $data['quantity'];
                    $product = $this->productService->getProduct($data['id']);
                    $item['price'] = $product->getPriceWithDiscount();
                    $item['discount'] = $product->discount ? $product->discount->value : 0;
                    $check = false;
                }
                $cartData[] = $item;
            }
            if ($check) {
                $cartData[] = $data;
            }
        } else {
            $cartData[] = $data;
        }
        $this->session->set('cart_data_products', $cartData);

        return response()->json($this->session->get('cart_data_products'));
    }

    public function deleteProduct(Request $request)
    {
        $cart = $this->session->get('cart_data_products');
        $id = $request->get('id') ?? 0;
        foreach ($cart as $key => $value) {
            if ($value['id'] === $id) {
                unset($cart[$key]);
            }
        }
        $this->session->set('cart_data_products', $cart);
    }

    public function updateProductQuantity(Request $request)
    {
        $cart = $this->session->get('cart_data_products');
        $id = $request->get('id') ?? 0;
        $product = null;
        $price = null;
        foreach ($cart as $key => &$value) {
            if ($value['id'] === $id) {
                $value['quantity'] = $request->get('quantity') ?? $value['quantity'];
            }
            $price = $this->productService->getProduct($value['id'])->getPriceWithDiscount() * $value['quantity'];
        }
        $this->session->set('cart_data_products', $cart);

        return response()->json(number_format($price, 2));
    }

    public function openCart()
    {
        $totalPrice = 0;
        $products = [];
        $complexes = [];
        if ($this->session->has('cart_data_products')) {
            foreach ($this->session->get('cart_data_products') as $cartItem) {
                $product = $this->productService->getProduct($cartItem['id']);
                $price = $product->getPriceWithDiscount() * $cartItem['quantity'];
                $products[] = [
                    'product' => $product,
                    'quantity' => $cartItem['quantity'],
                    'price' => $price,
                    'discount' => $product->discount->value,
                ];
                $totalPrice += $price;
            }
        }
        if ($this->session->has('cart_data_complex')) {
            foreach ($this->session->get('cart_data_complex') as $complex) {
                $product = $this->productService->getProduct($complex['product_id']);
                $relatedProduct = $this->productService->getProduct($complex['related_product_id']);
                $price = $product->getPriceWithDiscount() + ($relatedProduct->getPriceWithDiscount() * (1 - $complex['discount'] / 100)) * $complex['quantity'];
                $complexes[] = [
                    'product' => $product,
                    'related_product' => $relatedProduct,
                    'quantity' => $complex['quantity'],
                    'discount' => $complex['discount'],
                    'price' => $price,
                    'complex_id' => $complex['complex_id'],
                    'total_quantity' => $complex['total_quantity'],
                ];
                $totalPrice += $price * $complex['total_quantity'];
            }
        }
        $this->session->set('total_price', $totalPrice);
        $this->session->set('single', $products);
        $this->session->set('multiple', $complexes);
        return view('cart', [
            'products' => $products,
            'complexes' => $complexes,
            'total' => $totalPrice,
        ]);
    }

    public function getTotal()
    {
        $total = 0;
        if ($this->session->has('cart_data_products')) {
            foreach ($this->session->get('cart_data_products') as $cartItem) {
                $product = $this->productService->getProduct($cartItem['id']);
                $price = $product->getPriceWithDiscount() * $cartItem['quantity'];
                $total += $price;
            }
        }
        if ($this->session->has('cart_data_complex')) {
            foreach ($this->session->get('cart_data_complex') as $complex) {
                $product = $this->productService->getProduct($complex['product_id']);
                $relatedProduct = $this->productService->getProduct($complex['related_product_id']);
                $price = $product->getPriceWithDiscount() + ($relatedProduct->getPriceWithDiscount() * (1 - $complex['discount'] / 100)) * $complex['quantity'];
                $total += $price * $complex['total_quantity'];
            }
        }

        $this->session->set('total', $total);

        return response()->json(number_format($total, 2));
    }

    public function addComplexPack(Request $request)
    {
        $cart = $this->session->get('cart_data_complex') ?? [];
        $checker = false;
        if ($this->session->has('cart_data_complex')) {
            foreach ($cart as $key => &$cartItem) {
                if ($cartItem['complex_id'] === $request->get('complex_id')) {
                    $cartItem['total_quantity']++;
                    $checker = true;
                }
            }
        }
        if (!$checker) {
            $cart[] = array_merge($request->all(), ['total_quantity' => 1]);
        }
        $this->session->set('cart_data_complex', $cart);
    }

    public function deleteComplexPack(Request $request)
    {
        $cart = $this->session->get('cart_data_complex');

        $id = $request->get('id') ?? 0;
        foreach ($cart as $key => $value) {
            if ($value['complex_id'] === $id) {
                unset($cart[$key]);
            }
        }
        $this->session->set('cart_data_complex', $cart);
    }


    public function updateComplexQuantity(Request $request)
    {
        $cart = $this->session->get('cart_data_complex');
        $id = $request->get('id') ?? 0;
        $product = null;
        $price = 0;
        foreach ($cart as $key => &$value) {
            if ($value['complex_id'] === $id) {
                $value['total_quantity'] = $request->get('total_quantity') ?? $value['total_quantity'];
            }
            $product = $this->productService->getProduct($value['product_id']);
            $relatedProduct = $this->productService->getProduct($value['related_product_id']);
            $initialPrice = $product->getPriceWithDiscount() + ($relatedProduct->getPriceWithDiscount() * (1 - $value['discount'] / 100)) * $value['quantity'];

            $price = $initialPrice * $value['total_quantity'];
        }
        $this->session->set('cart_data_complex', $cart);

        return response()->json(number_format($price, 2));
    }

    public function submitOrder(Request $request)
    {
        $order = new Order();
        $order->order_data = json_encode([
            'total' => $this->session->get('total_price'),
            'products' => $this->session->get('cart_data_products'),
            'complexes' => $this->session->get('cart_data_complex'),
        ]);
        $order->user_data = json_encode($request->all());
        $order->user()->associate($request->user());
        $this->session->clear();
        $order->save();



        foreach (User::all() as $user) {
            if($user->hasRole('manager')){
                \Mail::to($user->email)->send(new ManagerEmail($order));
            }

        }

        return back();
    }



    public function getCart()
    {
        return view('modals.modal-cart')
            ->with('single', $this->session->get('single'))
            ->with('multiple', $this->session->get('multiple'))
            ->with('total', $this->session->get('total_price'));
    }
}
