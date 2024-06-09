<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendEmails
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $subject;

    public $body;

    public $header;

    public $token;

    public $url;

    public $buttonText;

    /**
     * Create a new event instance.
     */
    public function __construct($data)
    {
        $this->subject = $data['subject'];
        $this->body = $data['body'];
        $this->header = $data['header'];
        $this->url = $data['url'];
        $this->buttonText = $data['buttonText'];
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
