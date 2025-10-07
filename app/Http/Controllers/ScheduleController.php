<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedules; // pakai model yang benar
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ScheduleController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $schedules = Schedules::where('user_id', Auth::id())->latest()->get();
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

        Schedules::create([
            'subject' => $request->subject,
            'type' => $request->type,
            'description' => $request->description,
            'status' => $request->status,
            'deadline' => $request->deadline,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Schedule berhasil ditambahkan.');
    }

    public function edit(Schedules $schedule)
    {
        $this->authorize('update', $schedule);
        return view('schedules.edit', compact('schedule'));
    }

    public function update(Request $request, Schedules $schedule)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,Ongoing,Done',
            'deadline' => 'nullable|date',
        ]);

        $schedule->update($request->only('subject', 'type', 'description', 'status', 'deadline'));

        return redirect()->route('dashboard.index')->with('success', 'Schedule berhasil diperbarui.');
    }

    public function destroy(Schedules $schedule)
    {
        $this->authorize('delete', $schedule);
        $schedule->delete();

        return redirect()->route('dashboard.index')->with('success', 'Schedule berhasil dihapus.');
    }
}
