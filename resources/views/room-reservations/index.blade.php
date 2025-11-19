@extends('layouts.app')

@section('title', 'Room Reservations')

@section('content')

  {{-- Greeting --}}
  <div class="bg-white rounded-xl shadow p-6 mb-6">
    <div>
      <div class="text-xl text-gray-700">Good Evening,</div>
      <div class="font-bold text-2xl">{{ Auth::user()->name }}</div>
    </div>
  </div>

  {{-- Table --}}
  <div class="bg-white rounded-xl shadow p-6">

    <h2 class="text-xl font-semibold mb-4">Room Reservations</h2>

    <table class="min-w-full leading-normal">
      <thead>
        <tr>
          <th class="px-5 py-3 bg-[#1E88E5] text-white text-base">#</th>
          <th class="px-5 py-3 bg-[#1E88E5] text-white text-base">Room</th>
          <th class="px-5 py-3 bg-[#1E88E5] text-white text-base">Floor</th>
          <th class="px-5 py-3 bg-[#1E88E5] text-white text-base">Time</th>
          <th class="px-5 py-3 bg-[#1E88E5] text-white text-base">Member</th>
          <th class="px-5 py-3 bg-[#1E88E5] text-white text-base">Action</th>
        </tr>
      </thead>

      <tbody>
        @forelse ($reservations as $index => $reservation)
          <tr class="border-b">

            <td class="px-5 py-5">{{ $index + 1 }}</td>

            <td class="px-5 py-5">
              {{ $reservation->room?->name ?? '-' }}
            </td>

            <td class="px-5 py-5">
              Floor {{ $reservation->room?->floor?->number ?? '-' }}
            </td>

            <td class="px-5 py-5">
              {{ $reservation->start_time }} - {{ $reservation->end_time }}
            </td>

            <td class="px-5 py-5">
              {{ $reservation->user?->name ?? '-' }}
            </td>

            <td class="px-5 py-5">
              {{-- Hanya tampilkan tombol Cancel jika ini milik user login --}}
              @if ($reservation->user_id === Auth::id())
                <form action="{{ route('room-reservations.destroy', $reservation->id) }}" method="POST"
                  onsubmit="return confirm('Cancel this reservation?')">
                  @csrf
                  @method('DELETE')
                  <button class="px-3 py-1 bg-red-500 text-white rounded-lg">
                    Cancel
                  </button>
                </form>
              @else
                <span class="text-gray-400">—</span>
              @endif
            </td>
          </tr>

        @empty
          <tr>
            <td colspan="6" class="px-5 py-5 text-center text-gray-500">
              No reservations found.
            </td>
          </tr>
        @endforelse
      </tbody>

    </table>

    <div class="text-center mt-6">
      <a href="{{ route('room-reservations.create') }}"
        class="bg-[#1E88E5] hover:bg-[#2978BD] text-white font-bold py-2 px-4 rounded-md"><i class="bi bi-plus"></i>
        Reserve
      </a>
    </div>

  </div>

@endsection
