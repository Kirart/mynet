<?php

namespace App\Listeners;

use App\Events\NewFriend;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class VerifyFriend
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
     * @param  NewFriend  $event
     * @return void
     */
    public function handle(NewFriend $event)
    {
        echo 'new event';
        //
    }
}
