<?php

namespace App\Listeners;

use App\Events\UserSendFeedbackEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FeedbackWrite2FileListener
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

        file_put_contents(storage_path('feedback.log'), $data);
    }
}
