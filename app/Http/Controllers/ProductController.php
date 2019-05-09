<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Likes;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Views as UserView;
use App\Models\Likes as UserLike;

class ProductController extends Controller
{
    public function showSingeProduct(Category $category, Product $product, Request $request)
    {
      if (auth()->guest()) {
          if (!\Session::has('hash')) {
              \Session::put('hash', \Hash::make(md5('pidoras')));
          }
          $userViewedProduct = UserView::where('user_track', \Session::get('hash'))
              ->where('product_id', $product->id)->exists();
          if (!$userViewedProduct) {
              UserView::create([
                  'user_track' => \Session::get('hash'),
                  'product_id' => $product->id,
                  'expired_at' => Carbon::now()->addDays(7),
              ]);
          }

      } else {
          $userViewedProduct = UserView::where('user_track', $request->user()->id)
              ->where('product_id', $product->id)->exists();
          if (!$userViewedProduct) {
              UserView::create([
                  'user_track' => $request->user()->id,
                  'product_id' => $product->id,
                  'expired_at' => Carbon::now()->addDays(7),
              ]);
          }
      }
       $videos = json_decode($product->video_id);


        return view('default.single_product', [
            'product' => $product,
            'category' => $category,
            'videos' => $videos,
        ]);


    }

    public function addLikes(Category $category, Product $product, Request $request){
        if (auth()->guest()) {
            if (!\Session::has('hash')) {
                \Session::put('hash', \Hash::make(md5('pidoras')));
            }
            $userViewedProduct = UserLike::where('user_track', \Session::get('hash'))
                ->where('product_id', $product->id)->exists();
            if (!$userViewedProduct) {
                UserLike::create([
                    'user_track' => \Session::get('hash'),
                    'product_id' => $product->id,
                    'expired_at' => Carbon::now()->addDays(7),
                ]);
            }

        } else {
            $userViewedProduct = UserLike::where('user_track', $request->user()->id)
                ->where('product_id', $product->id)->exists();
            if (!$userViewedProduct) {
                UserLike::create([
                    'user_track' => $request->user()->id,
                    'product_id' => $product->id,
                    'expired_at' => Carbon::now()->addDays(7),
                ]);
            }
        }

        return back();
    }

    public function showLike()
    {
        return view('likes');
    }

    public function deleteLike(UserLike $user_like)
    {
        $user_like->delete();
        return back();
    }

    public function addComment(Category $category, Product $product, Request $request)
    {

        $product->addComment($request->except(['_token']), $request->user());
        return back();
    }

    public function updateComment(Category $category, Product $product, Comment $comment, Request $request)
    {
        $product->updateComment($request->except(['_token']), $request->user(), $comment);
        return back();
    }

    public function deleteComment(Comment $comment)
    {
        $comment->delete();
    }

    public function showSearchResults(string $searchText)
    {
        $searchedProducts = Product::search($searchText)->get();

        return view('modals.search')->with('products', $searchedProducts);
    }


}
