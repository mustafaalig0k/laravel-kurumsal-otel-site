<?php

namespace App\Listeners;

use App\Events\UserRegisterEvent;
use App\Notifications\WelcomeMailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserWelcomeMail;
use App\Models\User;

class UserRegisterListener
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
    public function handle(UserRegisterEvent $event): void
    {
        $token = Str::random(40);
        //Önbellekte 60dk boyunca token saklama işlemi
        Cache::put('verify_token_' . $token, $event->user->id,3600);

        $event->user->notify(new WelcomeMailNotification($token));

//        Mail::to($event->user->email)->send(new UserWelcomeMail($event->user, $token));
    }
}
