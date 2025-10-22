@extends('layouts.app')

@section('title', 'Delete Schedule')

@section('content')
  <div class="max-w-xl mx-auto bg-white shadow-md rounded-xl p-6 mt-10">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Delete Confirmation</h2>

    <p class="text-gray-600 mb-6">
      Are you sure you want to delete schedule:
      <strong class="text-red-600">{{ $schedule->subject }}</strong>?
    </p>

    <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" class="flex gap-3">
      @csrf
      @method('DELETE')

      <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md font-medium">
        Yes, Delete
      </button>

      <a href="{{ route('schedules.index') }}"
        class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md font-medium">
        Cancel
      </a>
    </form>
  </div>
@endsection
