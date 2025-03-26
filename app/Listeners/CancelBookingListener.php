<?php

namespace App\Listeners;

use App\Events\CancelBookingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CancelBookingListener
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
    public function handle(CancelBookingEvent $event): void
    {
        echo "Booking # " . $event->id . " has been cancelled" . PHP_EOL;
    }
}
