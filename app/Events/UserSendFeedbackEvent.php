<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserSendFeedbackEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    protected $inputData;

    public function __construct($inputData)
    {
        $this->inputData = $inputData;
    }

    public function getInputData()
    {
        return $this->inputData;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
