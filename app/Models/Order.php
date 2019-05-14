<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Models
 * @property string $user_data
 * @property string $status
 * @property string $order_data
 * @property Carbon $created_at
 */
class Order extends Model
{
    protected $guarded = [
        'id',
    ];
    protected $dates = [
        'created_at'
    ];

    public function getUserData()
    {

        return json_decode($this->user_data);
    }

    public function getOrderData()
    {

        return json_decode($this->order_data);
    }



    public function getProducts(): ?array
    {
        $data = json_decode($this->order_data);
        return $data->products;
    }

    public function getProductObjects(): array
    {
        $products = [];
        if($this->getProducts()) {
            foreach ($this->getProducts() as $product) {
                try {
                    $products[] = [
                        'product' => Product::find($product->id),
                        'quantity' => $product->quantity,
                        'color' => ProductColor::find($product->color ? $product->color : 0)
                    ];
                }
                catch (\Exception $exception) {
                    //dd($product);
                }

            }
        }
        return $products;
    }

    public function getComplexes(): ?array
    {
        $data = json_decode($this->order_data);
        return $data->complexes;
    }

    public function getComplexesObjects(): array
    {
        $complexes = [];
        if($this->getComplexes()) {
            foreach ($this->getComplexes() as $complex) {
                $complexes[] = [
                    'complex_id' => $complex->complex_id,
                    'discount' => $complex->discount,
                    'total_quantity' => $complex->total_quantity,
                    'product' => Product::find($complex->product_id),
                    'related_product' => Product::find($complex->related_product_id),
                    'quantity' => $complex->quantity,
                ];
            }
        }
        return $complexes;
    }

    public function getOrderTotal(): float
    {

        return isset($this->getOrderData()->total) ? $this->getOrderData()->total : 0;
    }



    public function getCreatedAt()
    {
        return $this->created_at->format('H:i d-m-Y');
    }

    public function changeStatus(string $status)
    {
        $this->status = $status;
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

