<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attribute;
use App\Models\Filter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilterCoroller extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }


    public function index ()
    {
        $attributes = Attribute::all();
        return view('admin.filter.filter')
            ->with('attributes', $attributes)
            ->with('filters', Filter::all());

    }

    public function create(Request $request)
    {
        $filter = new Filter();
        $filter->type = $request->get('type');
        $filter->title = $request->get('title');
        $filter->attribute()->associate(Attribute::find($request->get('attribute_id')));
        $filter->save();

        return back();
    }

    public function delete(Filter $filter)
    {
        $filter->delete();
        return back();
    }

}
