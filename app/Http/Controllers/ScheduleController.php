<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Schedules as Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
=======
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedules; // pakai model yang benar
>>>>>>> feature/auth-system
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ScheduleController extends Controller
{
    use AuthorizesRequests;
<<<<<<< HEAD
    public function index()
    {
        $schedules = Schedule::where('user_id', Auth::id())->latest()->get();
=======

    public function index()
    {
        $schedules = Schedules::where('user_id', Auth::id())->latest()->get();
>>>>>>> feature/auth-system
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

<<<<<<< HEAD
        Schedule::create([
=======
        Schedules::create([
>>>>>>> feature/auth-system
            'subject' => $request->subject,
            'type' => $request->type,
            'description' => $request->description,
            'status' => $request->status,
            'deadline' => $request->deadline,
            'user_id' => Auth::id(),
        ]);

<<<<<<< HEAD
        return redirect()->route('schedules.index')->with('success', 'Schedule berhasil ditambahkan.');
    }

    public function edit(Schedule $schedule)
    {
        $this->authorize('update', $schedule); // optional jika pakai policy
        return view('schedules.edit', compact('schedule'));
    }

    public function update(Request $request, Schedule $schedule)
=======
        return redirect()->route('dashboard.index')->with('success', 'Schedule berhasil ditambahkan.');
    }

    public function edit(Schedules $schedule)
    {
        $this->authorize('update', $schedule);
        return view('schedules.edit', compact('schedule'));
    }

    public function update(Request $request, Schedules $schedule)
>>>>>>> feature/auth-system
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,Ongoing,Done',
            'deadline' => 'nullable|date',
        ]);

        $schedule->update($request->only('subject', 'type', 'description', 'status', 'deadline'));

<<<<<<< HEAD
        return redirect()->route('schedules.index')->with('success', 'Schedule berhasil diperbarui.');
    }

    public function destroy(Schedule $schedule)
=======
        return redirect()->route('dashboard.index')->with('success', 'Schedule berhasil diperbarui.');
    }

    public function destroy(Schedules $schedule)
>>>>>>> feature/auth-system
    {
        $this->authorize('delete', $schedule);
        $schedule->delete();

<<<<<<< HEAD
        return redirect()->route('schedules.index')->with('success', 'Schedule berhasil dihapus.');
=======
        return redirect()->route('dashboard.index')->with('success', 'Schedule berhasil dihapus.');
>>>>>>> feature/auth-system
    }
}
