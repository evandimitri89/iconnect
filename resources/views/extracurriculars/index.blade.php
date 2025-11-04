@extends('layouts.app')

@section('title', 'Extracurricular')

@section('content')
  <div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-xl font-semibold mb-4">Your Extracurriculars</h2>
    <table class="min-w-full leading-normal">
      <thead>
        <tr>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] text-left text-base text-white uppercase tracking-wider">
            #</th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] text-left text-base text-white uppercase tracking-wider">
            Name</th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] text-left text-base text-white uppercase tracking-wider">
            Description</th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] text-left text-base text-white uppercase tracking-wider">
            Supervisor</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($extracurriculars as $index => $extracurricular)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $extracurricular->name }}</td>
            <td>{{ $extracurricular->description }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="px-5 py-5 text-center text-gray-500">Kamu belum mengikuti ekskul apa pun.</td>
          </tr>
        @endforelse

      </tbody>
    </table>
  </div>
@endsection
