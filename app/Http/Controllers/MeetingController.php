<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::latest()->get();

        return view('meetings.index', compact('meetings'));
    }

    public function create()
    {
        return view('meetings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'followed_by' => 'required',
            'topic' => 'required',
            'location' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'note' => 'nullable',
        ]);

        Meeting::create($request->all());

        return redirect()->route('meetings.index')->with('success', 'Meeting created successfully.');
    }

    public function update(Request $request, Meeting $meeting)
    {
        $request->validate([
            'followed_by' => 'required',
            'topic' => 'required',
            'location' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'note' => 'nullable',
        ]);

        $meeting->update($request->all());

        return redirect()->route('meetings.index')->with('success', 'Meeting updated successfully.');
    }

    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
        return redirect()->route('meetings.index')->with('success', 'Meeting deleted.');
    }
}

