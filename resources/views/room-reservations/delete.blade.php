@extends('layouts.app')

@section('title', 'Cancel Reservation')

@section('content')
  <div class="min-h-screen flex items-center justify-center px-4">
    <div class="max-w-xl w-full bg-white shadow-md rounded-xl p-6">

      <h2 class="text-xl font-semibold text-gray-800 mb-4">Cancel Reservation</h2>

      <p class="text-gray-600 mb-6">
        Are you sure you want to cancel your reservation for:
        <br>
        <strong class="text-red-600">
          {{ $reservation->room->name }}
        </strong>
        <br>
        at <strong>{{ $reservation->start_time }} - {{ $reservation->end_time }}</strong>?
      </p>

      <form action="{{ route('room-reservations.destroy', $reservation->id) }}" method="POST" class="flex gap-3">
        @csrf
        @method('DELETE')

        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md font-medium">
          Yes, Cancel
        </button>

        <a href="{{ route('room-reservations') }}"
          class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md font-medium">
          Back
        </a>
      </form>

    </div>
  </div>
@endsection
