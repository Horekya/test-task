<?php

namespace App\Listeners;

use App\Events\CreateBookingEvent;
use App\Repositories\BookingRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateBookingListener
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
    public function handle(CreateBookingEvent $event): void
    {
        echo "new booking saved" . PHP_EOL;
    }
}
