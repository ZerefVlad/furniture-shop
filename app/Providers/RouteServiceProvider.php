<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Galery;
use App\Models\Comment;
use App\Models\Filter;
use App\Models\Likes;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Subscribe;
use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
        Route::model('category', Category::class);
        Route::model('galery', Galery::class);
        Route::model('product', Product::class);
        Route::model('order', Order::class);
        Route::model('comment', Comment::class);
        Route::model('post', Post::class);
        Route::model('user', User::class);
        Route::model('subscribe', Subscribe::class);
        Route::model('like', Likes::class);
        Route::model('color', ProductColor::class);
        Route::model('filter', Filter::class);


    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
