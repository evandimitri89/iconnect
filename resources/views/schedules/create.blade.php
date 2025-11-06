@extends('layouts.app')

@section('title', 'Add Schedule')

@section('content')
  <div class="container flex justify-center items-center min-h-screen">

    <div class="bg-white rounded-xl shadow-lg p-8 max-w-4xl mx-auto">
      <h2 class="text-2xl font-bold text-gray-800 mb-6">Add New Schedule</h2>

      <form action="{{ route('schedules.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

          {{-- Subject --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
            <input type="text" name="subject" placeholder="Enter subject..."
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
              required>
          </div>

          {{-- Type --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
            <input type="text" name="type" placeholder="e.g. Assignment, Exam, Project..."
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
              required>
          </div>

          {{-- Description --}}
          <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea name="description" rows="3" placeholder="Write a short description..."
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"></textarea>
          </div>

          {{-- Status --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select name="status"
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
              required>
              <option value="">Select status</option>
              <option value="Pending">Pending</option>
              <option value="Ongoing">Ongoing</option>
              <option value="Done">Done</option>
            </select>
          </div>

          {{-- Deadline --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deadline</label>
            <input type="date" name="deadline"
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none
          focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
          </div>
        </div>

        {{-- Submit --}}
        <div class="flex justify-end mt-6">
          <a href="{{ route('dashboard') }}"
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
