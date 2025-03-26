<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Repositories\BookingRepository;
use App\Repositories\Interfaces\BookingRepositoryInterface;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct(private BookingRepositoryInterface $bookingRepository)
    {
    }

    public function store(Request $request): void
    {
        $newBooking = new Booking();
        $newBooking->fill($request->all());
        $newBooking->product_id = $request->get('resource_id');
        $this->bookingRepository->save($newBooking);
    }
    public function show(Request $request, int $id)
    {
        return BookingResource::collection($this->bookingRepository->getByResourceId($id));
    }
    public function destroy(Request $request, int $id)
    {
        return $this->bookingRepository->cancel($id);
    }
}
