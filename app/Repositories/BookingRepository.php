<?php
namespace App\Repositories;
use App\Events\CancelBookingEvent;
use App\Events\CreateBookingEvent;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Models\Product;
use App\Repositories\Interfaces\BookingRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Database\Eloquent\Collection;

class BookingRepository implements BookingRepositoryInterface
{
    public function getByResourceId($resourceId)
    {
        $product = Product::findOrFail($resourceId);
        return $product->bookings;
    }

    public function save(Booking $booking): bool
    {
        event(new CreateBookingEvent($booking));
        return $booking->save();
    }

    public function cancel($id): int
    {
        $booking = Booking::findOrFail($id);
        event(new CancelBookingEvent($id));
        return $booking->delete();
    }
}
