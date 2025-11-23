@extends('layouts.app')

@section('title', 'Room Reservations')

@section('content')

  {{-- Greeting --}}
  @php
    $hour = now()->format('H');

    if ($hour >= 5 && $hour < 12) {
        $greeting = 'Good Morning';
    } elseif ($hour >= 12 && $hour < 17) {
        $greeting = 'Good Afternoon';
    } elseif ($hour >= 17 && $hour < 21) {
        $greeting = 'Good Evening';
    } else {
        $greeting = 'Good Night';
    }
  @endphp


  <div class="bg-white rounded-xl shadow p-6 mb-6">
    <div>
      <div class="text-xl text-gray-800">{{ $greeting }},</div>
      <div class="font-bold text-2xl text-gray-800">{{ Auth::user()->name }}</div>
    </div>
  </div>

  {{-- Table --}}
  <div class="bg-white rounded-xl shadow p-6">
    @if (session('success'))
      <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-md">
        {{ session('success') }}
      </div>
    @endif

    @if (session('error'))
      <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-md">
        {{ session('error') }}
      </div>
    @endif
    <h2 class="text-xl font-semibold mb-4">Room Reservations</h2>

    <table class="min-w-full leading-normal w-full table-fixed">
      <thead>
        <tr>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] 
                     text-left text-base text-white uppercase tracking-wider">
            #
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] 
                     text-left text-base text-white uppercase tracking-wider">
            Room
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] 
                     text-left text-base text-white uppercase tracking-wider">
            Floor
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] 
                     text-left text-base text-white uppercase tracking-wider">
            Time
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] 
                     text-left text-base text-white uppercase tracking-wider">
            Member
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] 
                     text-left text-base text-white uppercase tracking-wider">
            Action
          </th>
        </tr>
      </thead>

      <tbody>
        @forelse ($reservations as $index => $reservation)
          <tr class="border-b border-gray-200">

            <td class="px-5 py-5 bg-white text-base">
              {{ $index + 1 }}
            </td>

            <td class="px-5 py-5 bg-white text-base">
              {{ $reservation->room?->name ?? '-' }}
            </td>

            <td class="px-5 py-5 bg-white text-base">
              {{ $reservation->room?->floor?->name ?? '-' }}
            </td>

            <td class="px-5 py-5 bg-white text-base">
              {{ $reservation->start_time }} - {{ $reservation->end_time }}
            </td>

            <td class="px-5 py-5 bg-white text-base">
              {{ $reservation->user?->name ?? '-' }}
            </td>

            <td class="px-5 py-5 bg-white text-base">
              @if ($reservation->user_id === Auth::id())
                <form action="{{ route('room-reservations.destroy', $reservation->id) }}" method="POST"
                  class="inline-block">
                  @csrf
                  @method('DELETE')

                  <a href="{{ route('room-reservations.delete', $reservation->id) }}"
                    class="p-2 rounded-md bg-red-100 text-red-700 hover:bg-red-200 transition">
                    <i class="bi bi-trash"></i>
                  </a>

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

    {{-- Add Button --}}
    <div class="text-center mt-6">
      <a href="{{ route('room-reservations.create') }}"
        class="bg-[#1E88E5] hover:bg-[#2978BD] text-white font-bold py-2 px-4 rounded-md">
        <i class="bi bi-plus"></i> Reserve
      </a>
    </div>

  </div>

@endsection
