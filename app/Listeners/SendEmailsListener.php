<?php

namespace App\Listeners;

use App\Events\SendEmails;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailsListener implements ShouldQueue
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
    public function handle(SendEmails $event): void
    {
        $subscribers = \App\Models\Subscribers::where('is_verified', 1)->get();

        foreach ($subscribers as $subscriber) {
            \Illuminate\Support\Facades\Mail::to($subscriber->email)->queue(new \App\Mail\SubscribersEmail([
                'subject' => $event->subject,
                'body' => $event->body,
                'header' => $event->header,
                'token' => $subscriber->token,
                'url' => $event->url,
                'buttonText' => $event->buttonText,
            ]));
        }
    }
}
