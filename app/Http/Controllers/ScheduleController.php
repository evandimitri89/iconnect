<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ScheduleController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $schedules = Schedule::where('user_id', Auth::id())->latest()->get();
        return view('dashboard.index', compact('schedules'));
    }

    public function create()
    {
        return view('schedules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,Ongoing,Done',
            'deadline' => 'nullable|date',
        ]);

        Schedule::create([
            'subject' => $request->subject,
            'type' => $request->type,
            'description' => $request->description,
            'status' => $request->status,
            'deadline' => $request->deadline,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Schedule berhasil ditambahkan.');
    }

    public function edit(Schedule $schedule)
    {
        $this->authorize('update', $schedule);
        return view('schedules.edit', compact('schedule'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,Ongoing,Done',
            'deadline' => 'nullable|date',
        ]);

        $schedule->update($request->only('subject', 'type', 'description', 'status', 'deadline'));

        return redirect()->route('dashboard')->with('success', 'Schedule berhasil diperbarui.');
    }

    // Halaman konfirmasi delete
    public function delete(Schedule $schedule)
    {
        return view('schedules.delete', compact('schedule'));
    }

    // Eksekusi delete
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('dashboard')->with('success', 'Schedule berhasil dihapus.');
    }
}
