@extends('layouts.app')

@section('title', 'Meetings')

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

  {{-- Notifications --}}
  <div class="bg-white rounded-xl shadow p-6 mb-6">

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

    <h2 class="text-xl font-semibold mb-4">Meeting Schedule</h2>

    {{-- Table --}}
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
            Followed By
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5]
                     text-left text-base text-white uppercase tracking-wider">
            Topic
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5]
                     text-left text-base text-white uppercase tracking-wider">
            Location
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5]
                     text-left text-base text-white uppercase tracking-wider">
            Date
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5]
                     text-left text-base text-white uppercase tracking-wider">
            Time
          </th>

          {{-- ACTION ONLY FOR OSIS --}}
          @if (Auth::user()->role === 'osis')
            <th
              class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5]
                       text-left text-base text-white uppercase tracking-wider">
              Action
            </th>
          @endif
        </tr>
      </thead>

      <tbody>
        @forelse ($meetings as $index => $meeting)
          <tr class="border-b border-gray-200">

            {{-- # --}}
            <td class="px-5 py-5 bg-white text-base">
              {{ $index + 1 }}
            </td>

            {{-- Followed by --}}
            <td class="px-5 py-5 bg-white text-base">
              {{ $meeting->followed_by }}
            </td>

            {{-- Topic --}}
            <td class="px-5 py-5 bg-white text-base">
              {{ $meeting->topic }}
            </td>

            {{-- Location --}}
            <td class="px-5 py-5 bg-white text-base">
              {{ $meeting->location }}
            </td>

            {{-- Date --}}
            <td class="px-5 py-5 bg-white text-base">
              {{ \Carbon\Carbon::parse($meeting->date)->format('d F Y') }}
            </td>

            {{-- Time --}}
            <td class="px-5 py-5 bg-white text-base">
              {{ \Carbon\Carbon::parse($meeting->time)->format('H:i') }}
            </td>

            {{-- ACTION (Only OSIS) --}}
            @if (Auth::user()->role === 'osis')
              <td class="px-5 py-5 bg-white text-base flex gap-2">

                {{-- Edit --}}
                <a href="{{ route('meetings.edit', $meeting->id) }}"
                  class="p-2 rounded-md bg-blue-100 text-blue-700 hover:bg-blue-200 transition">
                  <i class="bi bi-pencil"></i>
                </a>

                {{-- Delete --}}
                <a href="{{ route('meetings.delete', $meeting->id) }}"
                  class="p-2 rounded-md bg-red-100 text-red-700 hover:bg-red-200 transition">
                  <i class="bi bi-trash"></i>
                </a>

              </td>
            @endif

          </tr>

        @empty
          <tr>
            <td colspan="{{ Auth::user()->role === 'osis' ? 7 : 6 }}" class="px-5 py-5 text-center text-gray-500">
              No meetings found.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>

    {{-- Add Button (Only OSIS) --}}
    @if (Auth::user()->role === 'osis')
      <div class="text-center mt-6">
        <a href="{{ route('meetings.create') }}"
          class="bg-[#1E88E5] hover:bg-[#2978BD] text-white font-bold py-2 px-4 rounded-md">
          <i class="bi bi-plus"></i> Add Meeting
        </a>
      </div>
    @endif

  </div>

@endsection
