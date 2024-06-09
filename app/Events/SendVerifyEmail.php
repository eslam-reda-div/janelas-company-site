<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendVerifyEmail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $subject;

    public $body;

    public $header;

    public $token;

    public $url;

    public $buttonText;

    public $email;

    /**
     * Create a new event instance.
     */
    public function __construct($data)
    {
        $this->subject = 'Verify Email';
        $this->body = 'Please click the button below to verify your email address.';
        $this->header = 'Verify Email';
        $this->url = url('verify-subscriber/'.$data['token']);
        $this->token = $data['token'];
        $this->buttonText = 'Verify Email';
        $this->email = $data['email'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('channel-name'),
        ];
    }
}
