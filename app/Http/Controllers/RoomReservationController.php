<?php

namespace App\Http\Controllers;

use App\Models\RoomReservation;
use Illuminate\Http\Request;

class RoomReservationController extends Controller
{
    public function index()
    {
        $reservations = auth()->user()
            ->roomReservations()
            ->with('room.floor')
            ->latest()
            ->get();

        return view('room-reservations.index', compact('reservations'));
    }
}
