@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

  <h1 class="text-2xl font-bold text-gray-800 mb-6">Admin Dashboard</h1>

  {{-- LOST & FOUND --}}
  <div class="bg-white rounded-xl shadow p-6 mb-6">
    <h2 class="text-lg font-semibold mb-4">Lost & Found</h2>

    <table class="min-w-full table-fixed border">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-2 border">ID</th>
          <th class="px-4 py-2 border">Item</th>
          <th class="px-4 py-2 border">Status</th>
        </tr>
      </thead>


    @endsection
