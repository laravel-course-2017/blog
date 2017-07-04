<?php

namespace App\Listeners;

use App\Events\UserSendFeedbackEvent;
use App\Models\Message;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FeedbackSaveDbListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserSendFeedbackEvent  $event
     * @return void
     */
    public function handle(UserSendFeedbackEvent $event)
    {
        $data = serialize($event->getInputData());

        Message::create([
            'message' => $data
        ]);
    }
}
