<?php

namespace App\Http\Controllers\Admin;

use App\Mail\UserEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SubscribeController extends Controller
{
    public function __construct()
    {

//        $this->middleware('auth');
    }

    public function index()
    {
        $subscribers = $this->getSubscribers();

        return view('admin.subscribe.subscribe')
            ->with('subscribers', $subscribers);
    }

    public function writeLetter()
    {
        return view('admin.dashboard');

    }

    public function getSubscribers()
    {
        return Subscribe::all();
    }

    public function addSubscriber(Request $request)
    {

        Subscribe::create($request->only('email'));
        return back();
    }


    public function deleteSubscribe(Subscribe $subscribe)
    {

        $subscribe->delete();
        return back();
    }

    public function sendEmail(Request $request)
    {
        Storage::putFileAs('emails/attachments/', $request->file('attachment'), $request->file('attachment').'.jpg');
        $img = Storage::url('emails/attachments/tmp/'.$request->file('attachment')->getFilename().'.jpg');
        foreach (Subscribe::all('email') as $subscriber) {
            Mail::to($subscriber->email)->send(new UserEmail([
                array_merge(
                    $request->except('attachment'),
                    [
                        'img' => $img,
                    ])
            ]));
        }
        return back();
    }
}
