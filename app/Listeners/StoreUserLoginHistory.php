<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Models\LoginHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreUserLoginHistory
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
     * @param object $event
     * @return void
     */
    public function handle(UserLoggedIn $event): void
    {
        $entry = new LoginHistory();
        $entry->user_id = $event->user->id;
        $entry->user_ip = $event->request->ip();
        $entry->created_at = new \DateTime();
        $entry->save();
    }
}
