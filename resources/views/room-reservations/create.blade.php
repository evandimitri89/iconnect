@extends('layouts.app')

@section('title', 'Create Room Reservation')

@section('content')
  <div class="container flex justify-center items-center min-h-screen">

    <div class="bg-white rounded-xl shadow-lg p-8 max-w-4xl mx-auto">
      <h2 class="text-2xl font-bold text-gray-800 mb-6">New Room Reservation</h2>

      <form action="{{ route('room-reservations.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

          {{-- Room --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Room</label>
            <select name="room_id"
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                     focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
              required>
              <option value="">Choose room...</option>
              @foreach ($rooms as $room)
                <option value="{{ $room->id }}">{{ $room->name }}</option>
              @endforeach
            </select>
          </div>

          {{-- Purpose --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Purpose</label>
            <input type="text" name="purpose" placeholder="e.g. Study Group, Meeting..."
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                     focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
              required>
          </div>

          {{-- Date --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
            <input type="date" name="date" value="{{ now()->toDateString() }}"
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                     focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
              required>
          </div>

          {{-- Start Time --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Start Time</label>
            <input type="time" name="start_time"
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                     focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
              required>
          </div>

          {{-- End Time --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">End Time</label>
            <input type="time" name="end_time"
              class="w-full border border-gray-300 rounded-lg rounded-lg shadow-sm p-2 outline-none focus:outline-none
                     focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
              required>
          </div>

          {{-- Notes --}}
          <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Notes (optional)</label>
            <textarea name="notes" rows="3" placeholder="Optional notes..."
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                     focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"></textarea>
          </div>

        </div>

        {{-- Submit --}}
        <div class="flex justify-end mt-6">
          <a href="{{ route('room-reservations') }}"
            class="mr-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg transition">
            Cancel
          </a>
          <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow transition">
            Reserve
          </button>
        </div>

      </form>
    </div>
  </div>
@endsection
