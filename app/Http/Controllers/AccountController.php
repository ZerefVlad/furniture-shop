<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(Request $request)
    {

   //  dd($request->user()->orders);
     $order = $request->user()->orders;
     $user = $request->user();
        return view('personal_account', [
            'orders' => $order,
            'user' => $user
        ]);
    }
}
