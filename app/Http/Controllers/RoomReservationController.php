<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\RoomReservation;

class RoomReservationController extends Controller
{
    public function index()
    {
        $reservations = RoomReservation::with(['room.floor', 'user'])
            ->latest()
            ->get();

        return view('room-reservations.index', compact('reservations'));
    }

    public function create()
    {
        $rooms = Room::with('floor')->get();
        return view('room-reservations.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'purpose' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        RoomReservation::create([
            'user_id' => auth()->id(),
            'room_id' => $request->room_id,
            'purpose' => $request->purpose,
            'reserved_date' => now()->toDateString(),
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 'pending',
        ]);

        return redirect()->route('room-reservations')
            ->with('success', 'Reservation created!');
    }

    public function destroy($id)
    {
        $reservation = RoomReservation::findOrFail($id);

        if ($reservation->user_id !== auth()->id()) {
            return redirect()->route('room-reservations')
                ->with('error', 'You are not allowed to cancel this reservation.');
        }

        $reservation->delete();

        return redirect()->route('room-reservations')
            ->with('success', 'Reservation cancelled.');
    }

    public function delete($id)
    {
        $reservation = RoomReservation::findOrFail($id);

        if ($reservation->user_id !== auth()->id()) {
            abort(403);
        }

        return view('room-reservations.delete', compact('reservation'));
    }

}
