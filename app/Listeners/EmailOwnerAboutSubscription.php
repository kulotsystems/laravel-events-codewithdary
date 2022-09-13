<?php

namespace App\Listeners;

use App\Events\UserSubscribeEvent;
use App\Mail\UserSubscribeMessage;
use App\Models\NewsLetter;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailOwnerAboutSubscription
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
     * @param  object  $event
     * @return void
     */
    public function handle (UserSubscribeEvent $event)
    {
        NewsLetter::create([
            'email' => $event->email
        ]);

        Mail::to($event->email)->send(new UserSubscribeMessage());
    }
}
