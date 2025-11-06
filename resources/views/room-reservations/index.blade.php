@extends('layouts.app')

@section('title', 'Room Reservation')

@section('content')
  <div class="bg-white rounded-xl shadow p-6">

    <h2 class="text-xl font-semibold mb-4">Room Reservation</h2>

    <table class="min-w-full leading-normal">
      <thead>
        <tr>
          <th>#</th>
          <th>Room</th>
          <th>Floor</th>
          <th>Date</th>
          <th>Time</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>
        @forelse($reservations as $index => $r)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $r->room->name }}</td>
            <td>{{ $r->room->floor->name ?? '-' }}</td>
            <td>{{ $r->reserved_date }}</td>
            <td>{{ $r->start_time }} - {{ $r->end_time }}</td>
            <td>
              @if ($r->status == 'approved')
                <span class="text-green-600">Approved</span>
              @elseif($r->status == 'rejected')
                <span class="text-red-600">Rejected</span>
              @else
                <span class="text-gray-600">Pending</span>
              @endif
            </td>
            <td>
              <button class="text-blue-500">Details</button>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="text-center text-gray-500 py-4">
              You have no room reservations.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>

    <div class="flex justify-center mt-6">
      <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Reserve</a>
    </div>

  </div>
@endsection
