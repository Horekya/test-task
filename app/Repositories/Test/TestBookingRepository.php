<?php
namespace App\Repositories\Test;
use App\Events\CancelBookingEvent;
use App\Events\CreateBookingEvent;
use App\Models\Booking;
use App\Models\Product;
use App\Repositories\Interfaces\BookingRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TestBookingRepository implements BookingRepositoryInterface
{
    static array $bookings = [];
    public function getByResourceId($resourceId)
    {
        $product = Product::findOrFail($resourceId);
        $result = [];
        foreach (self::$bookings as $booking)
        {
            if ($booking->product_id == $resourceId)
            {
                $result[] = $booking;
            }
        }
        return $result;
    }

    public function save(Booking $booking): bool
    {
        event(new CreateBookingEvent($booking));
        $booking->id = count(self::$bookings) + 1;
        self::$bookings[] = $booking;
        return true;
    }

    public function cancel($id): int
    {
        $was_found = false;
        $tmp_array = [];
        foreach (self::$bookings as $booking)
        {
            if ($booking->id == $id)
            {
                $was_found = true;
            }else
                $tmp_array[] = $booking;
        }
        event(new CancelBookingEvent($id));
        if($was_found)
            self::$bookings = $tmp_array;
        return $was_found ? $id : 0;
    }
}
