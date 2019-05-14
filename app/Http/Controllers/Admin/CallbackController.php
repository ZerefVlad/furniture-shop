<?php

namespace App\Http\Controllers\Admin;

use App\Models\Callback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CallbackController extends Controller
{

    public function index()
    {
        return view('admin.callback.callback')
            ->with('callbacks', Callback::all());
    }
}
