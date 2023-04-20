<?php

namespace App\Listeners;

use App\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Carbon\Carbon;

class LastUserLogin
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
    public function handle(Login $event): void
    {
        $user_id=$event->user->id;
        $user=User::findOrFail($user_id);
        $user->last_login=Carbon::now();
        $user->save();
        //dd('the listener is active');
    }
}
