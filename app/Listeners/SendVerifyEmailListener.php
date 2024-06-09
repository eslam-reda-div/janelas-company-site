<?php

namespace App\Listeners;

use App\Events\SendVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendVerifyEmailListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendVerifyEmail $event): void
    {
        \Illuminate\Support\Facades\Mail::to($event->email)->queue(new \App\Mail\SubscribersEmail([
            'subject' => $event->subject,
            'body' => $event->body,
            'header' => $event->header,
            'token' => $event->token,
            'url' => $event->url,
            'buttonText' => $event->buttonText,
        ]));
    }
}
