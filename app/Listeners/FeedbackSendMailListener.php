<?php

namespace App\Listeners;

use App\Events\UserSendFeedbackEvent;
use App\Mail\FeedbackMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class FeedbackSendMailListener
{

    public function __construct()
    {
        //
    }

    public function handle(UserSendFeedbackEvent $event)
    {
        Mail::to('yurev@ntschool.ru')
            ->send(new FeedbackMail($event->getInputData()));

        /*Mail::raw('Привет, это простое текстовое сообщение', function($message)
        {
            $message->from(config('blog.mailfrom'), 'Laravel');
            $message->subject(config('blog.subject'));
            $message->to(config('blog.mailto'));
        });*/
    }
}
