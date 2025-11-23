@extends('layouts.app')

@section('content')
  <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Add Meeting</h1>

    <form action="{{ route('meetings.store') }}" method="POST">
      @csrf

      @include('meetings.partials.form')

      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Save
      </button>
    </form>
  </div>
@endsection
