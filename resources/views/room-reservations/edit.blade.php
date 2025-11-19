@extends('layouts.app')

@section('title', 'Edit Reservation')

@section('content')
  <div class="container flex justify-center items-center min-h-screen">

    <div class="bg-white rounded-xl shadow-lg p-8 max-w-4xl mx-auto">
      <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Reservation</h2>

      <form action="{{ route('room-reservations.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

          {{-- Room --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Room</label>
            <select name="room_id"
              class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 transition" required>
              @foreach ($rooms as $room)
                <option value="{{ $room->id }}" @selected($reservation->room_id == $room->id)>
                  {{ $room->name }} (Floor {{ $room->floor->number }})
                </option>
              @endforeach
            </select>
          </div>

          {{-- Purpose --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Purpose</label>
            <input type="text" name="purpose" value="{{ $reservation->purpose }}"
              class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 transition" required>
          </div>

          {{-- Date --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
            <input type="date" name="date" value="{{ $reservation->date }}"
              class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 transition" required>
          </div>

          {{-- Start Time --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Start Time</label>
            <input type="time" name="start_time" value="{{ $reservation->start_time }}"
              class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 transition" required>
          </div>

          {{-- End Time --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">End Time</label>
            <input type="time" name="end_time" value="{{ $reservation->end_time }}"
              class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 transition" required>
          </div>

          {{-- Notes --}}
          <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
            <textarea name="notes" rows="3"
              class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 transition">{{ $reservation->notes }}</textarea>
          </div>
        </div>

        {{-- Submit --}}
        <div class="flex justify-between mt-6">

          {{-- Delete --}}
          <button type="button" onclick="document.getElementById('deleteModal').classList.remove('hidden')"
            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg shadow transition">
            Cancel Reservation
          </button>

          {{-- Save --}}
          <div>
            <a href="{{ route('room-reservations.index') }}"
              class="mr-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg transition">
              Back
            </a>
            <button type="submit"
              class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow transition">
              Save Changes
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  {{-- DELETE MODAL --}}
  <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-xl shadow-xl w-96">

      <h2 class="text-lg font-bold mb-4">Cancel Reservation?</h2>
      <p class="text-gray-700 mb-4">Are you sure you want to cancel this reservation?</p>

      <div class="flex justify-end gap-3">
        <button onclick="document.getElementById('deleteModal').classList.add('hidden')"
          class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-4 rounded-lg">
          No
        </button>

        <form action="{{ route('room-reservations.destroy', $reservation->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg">
            Yes, Cancel
          </button>
        </form>
      </div>

    </div>
  </div>
@endsection
