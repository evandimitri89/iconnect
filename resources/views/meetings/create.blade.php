@extends('layouts.app')

@section('title', 'Add Meeting')

@section('content')
  <div class="container flex justify-center items-center min-h-screen">

    <div class="bg-white rounded-xl shadow-lg p-8 max-w-4xl mx-auto">
      <h2 class="text-2xl font-bold text-gray-800 mb-6">Add New Meeting</h2>

      <form action="{{ route('meetings.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

          {{-- Followed By --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Followed By</label>
            <input type="text" name="followed_by" placeholder="e.g. OSIS, MPK, Guru..."
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                     focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
              required>
          </div>

          {{-- Topic --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Topic</label>
            <input type="text" name="topic" placeholder="Enter meeting topic..."
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                     focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
              required>
          </div>

          {{-- Location --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Location</label>
            <input type="text" name="location" placeholder="e.g. Ruang OSIS, Aula..."
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                     focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
              required>
          </div>

          {{-- Date --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
            <input type="date" name="date"
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                     focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
              required>
          </div>

          {{-- Time --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Time</label>
            <input type="time" name="time"
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                     focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
              required>
          </div>

          {{-- Notes --}}
          <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Note</label>
            <textarea name="note" rows="3" placeholder="Additional notes..."
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                     focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"></textarea>
          </div>

        </div>

        {{-- Submit --}}
        <div class="flex justify-end mt-6">
          <a href="{{ route('meetings.index') }}"
            class="mr-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg transition">
            Cancel
          </a>

          <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow transition">
            Save
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
