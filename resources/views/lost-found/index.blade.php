@extends('layouts.app')

@section('title', 'Lost & Found')

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

    <h2 class="text-xl font-semibold mb-4">Lost & Found Items</h2>

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
            Name
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5]
                     text-left text-base text-white uppercase tracking-wider">
            Description
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5]
                     text-left text-base text-white uppercase tracking-wider">
            Date
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5]
                     text-left text-base text-white uppercase tracking-wider">
            Reported By
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5]
                     text-left text-base text-white uppercase tracking-wider">
            Status
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5]
                     text-left text-base text-white uppercase tracking-wider">
            Action
          </th>
        </tr>
      </thead>

      <tbody>
        @forelse ($items as $index => $item)
          <tr class="border-b border-gray-200">

            {{-- Index --}}
            <td class="px-5 py-5 bg-white text-base">
              {{ $index + 1 }}
            </td>

            {{-- Name --}}
            <td class="px-5 py-5 bg-white text-base">
              {{ $item->item_name }}
            </td>

            {{-- Description --}}
            <td class="px-5 py-5 bg-white text-base">
              {{ $item->description }}
            </td>

            {{-- Found/Lost Date --}}
            <td class="px-5 py-5 bg-white text-base">
              {{ \Carbon\Carbon::parse($item->found_date)->format('d F Y') }}
            </td>

            {{-- Reporter --}}
            <td class="px-5 py-5 bg-white text-base">
              {{ $item->reporter->name }}
            </td>

            {{-- Status --}}
            <td class="px-5 py-5 bg-white text-base">
              @if ($item->status === 'lost')
                <span class="bg-yellow-200 text-yellow-700 px-3 py-1 rounded-full text-sm">Lost</span>
              @else
                <span class="bg-green-200 text-green-700 px-3 py-1 rounded-full text-sm">Found</span>
              @endif
            </td>

            {{-- Action --}}
            <td class="px-5 py-5 bg-white text-base">

              {{-- Claim Button --}}
              @if ($item->status === 'found' && $item->reported_by != Auth::id() && $item->claimed_by === null)
                <form action="{{ route('lost-found.claim', $item->id) }}" method="POST" class="inline">
                  @csrf
                  <button onclick="confirmClaim('{{ route('lost-found.claim', $item->id) }}')"
                    class="p-2 rounded-md bg-green-100 text-green-700 hover:bg-green-200 transition">
                    Claim
                  </button>

                </form>
              @endif

              {{-- Delete Button --}}
              @if ($item->reported_by == Auth::id())
                <form action="{{ route('lost-found.delete', $item->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this item?');" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="p-2 rounded-md bg-red-100 text-red-700 hover:bg-red-200 transition">
                    <i class="bi bi-trash"></i>
                  </button>
                </form>
              @endif

            </td>


          </tr>

        @empty
          <tr>
            <td colspan="7" class="px-5 py-5 text-center text-gray-500">
              No items found.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>

    {{-- Add Button --}}
    <div class="text-center mt-6">
      <a href="{{ route('lost-found.create') }}"
        class="bg-[#1E88E5] hover:bg-[#2978BD] text-white font-bold py-2 px-4 rounded-md">
        <i class="bi bi-plus"></i> Report
      </a>
    </div>

  </div>

@endsection
