<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\RoomReservation;

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
            'reserved_date' => now()->toDateString(), // otomatis hari ini
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 'pending', // ikut enum di migration
        ]);

        return redirect()->route('room-reservations')
            ->with('success', 'Reservation created!');
    }

    public function edit($id)
    {
        $reservation = RoomReservation::findOrFail($id);
        $rooms = Room::with('floor')->get();

        return view('room-reservations.edit', compact('reservation', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_id' => 'required',
            'purpose' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $reservation = RoomReservation::findOrFail($id);

        $reservation->update([
            'room_id' => $request->room_id,
            'purpose' => $request->purpose,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route('room-reservations')
            ->with('success', 'Reservation updated!');
    }

    public function destroy($id)
    {
        RoomReservation::findOrFail($id)->delete();

        return redirect()->route('room-reservations')
            ->with('success', 'Reservation cancelled.');
    }
}
