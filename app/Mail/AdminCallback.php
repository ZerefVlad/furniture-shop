<?php

namespace App\Mail;

use App\Models\Callback;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminCallback extends Mailable
{
    use Queueable, SerializesModels;

    protected $callback;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Callback $callback)
    {
        $this->callback = $callback;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = json_decode($this->callback->callback);
        return $this->view('emails.callback-mail')
            ->with('data', $data)
            ->with('type', $this->callback->type)
            ;
    }
}
