<?php
namespace App\Repositories\Interfaces;
use App\Models\Booking;

interface BookingRepositoryInterface
{
    public function save(Booking $booking);
    public function cancel($id);
    public function getByResourceId($resourceId);
}
