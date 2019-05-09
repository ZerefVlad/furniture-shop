<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductColorController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.product_color.product_color')
            ->with('colors', ProductColor::all());
    }

    public function colorCreate(Request $request)
    {
        $color = new ProductColor();
        $color->title = $request->get('title');
        $color->save();
        if ($request->has('img')) {
            $request->file('img')->storeAs('/colors', $request->title.'.jpg');
            $image = new Image();
            $image->title = $request->get('title').'jpg';
            $image->url = Storage::url('/colors/'.$request->title.'.jpg');
            $image->alt = $image->title;
            $image->model = ProductColor::class;
            $image->model_id = $color->id;
            $image->save();
        }

        return back();
    }

    public function colorDelete(ProductColor $color)
    {
        $color->delete();
        return back();
    }
}
