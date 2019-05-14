<?php

namespace App\Http\Controllers;

use App\Mail\AdminCallback;
use App\Models\Callback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CallbackController extends Controller
{
    public function send(Request $request)
    {
        $callback = new Callback();
        $callback->type = $request->get('type');
        $callback->callback = json_encode($request->except('type'));
        $callback->save();

        Mail::to('admin@admin.com')->send(new AdminCallback($callback));

        return back();
    }
}
