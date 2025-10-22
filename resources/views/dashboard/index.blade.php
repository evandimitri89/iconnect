@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <div class="bg-white rounded-xl shadow p-6 mb-6">
    <div class="flex items-start justify-between">
      <div>
        <div class="font-semi-bold text-xl text-gray-800">Good Evening,</div>
        <div class="font-bold text-2xl text-gray-800">{{ Auth::user()->name }}</div>
      </div>
    </div>
  </div>

  {{-- Banner --}}
  <div class="p-6 mt-6">
    <img src="{{ asset('img/picture.png') }}" alt="Illustration" class="w-full h-auto object-cover rounded-lg">
  </div>

  {{-- Schedules --}}
  <div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-xl font-semibold mb-4">Your Schedules</h2>
    <table class="min-w-full leading-normal">
      <thead>
        <tr>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] text-left text-base text-white uppercase tracking-wider">
            #</th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] text-left text-base text-white uppercase tracking-wider">
            Subject</th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] text-left text-base text-white uppercase tracking-wider">
            Type</th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] text-left text-base text-white uppercase tracking-wider">
            Description</th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] text-left text-base text-white uppercase tracking-wider">
            Status</th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] text-left text-base text-white uppercase tracking-wider">
            Deadline</th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] text-left text-base text-white uppercase tracking-wider">
            Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($schedules as $index => $schedule)
          <tr>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-base">{{ $index + 1 }}</td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-base">{{ $schedule->subject }}</td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-base">{{ $schedule->type }}</td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-base">{{ $schedule->description }}</td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-base">
              @php
                $statusColors = [
                    'Pending' => 'bg-yellow-200 text-yellow-800',
                    'Ongoing' => 'bg-blue-200 text-blue-800',
                    'Done' => 'bg-green-200 text-green-800',
                ];
              @endphp
              <span
                class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusColors[$schedule->status] ?? 'bg-gray-200 text-gray-800' }}">
                {{ $schedule->status }}
              </span>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-base">
              {{ $schedule->deadline ? \Carbon\Carbon::parse($schedule->deadline)->format('d M Y') : '-' }}
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-base flex space-x-2">
              {{-- Edit --}}
              <a href="{{ route('schedules.edit', $schedule->id) }}"
                class="p-2 rounded-md bg-blue-100 text-blue-700 hover:bg-blue-200 transition">
                <i class="bi bi-pencil"></i>
              </a>
              {{-- Delete --}}
              <a href="{{ route('schedules.delete', $schedule->id) }}"
                class="p-2 rounded-md bg-red-100 text-red-700 hover:bg-red-200 transition">
                <i class="bi bi-trash"></i>
              </a>
            </td>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="px-5 py-5 text-center text-gray-500">Belum ada jadwal</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    {{-- Add Button --}}
    <div class="text-center mt-6">
      <a href="{{ route('schedules.create') }}"
        class="bg-[#1E88E5] hover:bg-[#2978BD] text-white font-bold py-2 px-4 rounded-md">
        <i class="bi bi-plus"></i>Add
      </a>
    </div>
  </div>
@endsection
