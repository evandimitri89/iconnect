@extends('layouts.app')

@section('title', 'Edit Schedule')

@section('content')
  <div class="min-h-screen flex items-center justify-center px-4">

    <div class="bg-white rounded-xl shadow-lg p-8 max-w-4xl w-full">
      <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Schedule</h2>

      <form action="{{ route('schedules.update', $schedule) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

          {{-- Subject --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
            <input type="text" name="subject" value="{{ old('subject', $schedule->subject) }}"
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                     focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
          </div>

          {{-- Type --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
            <input type="text" name="type" value="{{ old('type', $schedule->type) }}"
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                     focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
          </div>

          {{-- Description --}}
          <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea name="description" rows="3"
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                     focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">{{ old('description', $schedule->description) }}</textarea>
          </div>

          {{-- Status --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select name="status"
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                     focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
              <option value="Pending" {{ $schedule->status == 'Pending' ? 'selected' : '' }}>Pending</option>
              <option value="Ongoing" {{ $schedule->status == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
              <option value="Done" {{ $schedule->status == 'Done' ? 'selected' : '' }}>Done</option>
            </select>
          </div>

          {{-- Deadline --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deadline</label>
            <input type="date" name="deadline" value="{{ old('deadline', $schedule->deadline) }}"
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                     focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
          </div>

        </div>

        {{-- Buttons --}}
        <div class="flex justify-end mt-6">
          <a href="{{ route('dashboard') }}"
            class="mr-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg transition">
            Cancel
          </a>
          <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow transition">
            Update
          </button>
        </div>

      </form>
    </div>
  </div>
@endsection
