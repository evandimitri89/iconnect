@extends('layouts.app')

@section('title', 'Extracurricular')

@section('content')
  <div class="bg-white rounded-xl shadow p-6 mb-6">
    <div class="flex items-start justify-between">
      <div>
        <div class="font-semi-bold text-xl text-gray-800">Good Evening,</div>
        <div class="font-bold text-2xl text-gray-800">{{ Auth::user()->name }}</div>
      </div>
    </div>
  </div>
  <div class="bg-white rounded-xl shadow p-6">

    <h2 class="text-xl font-semibold mb-4">Your Extracurricular Schedules</h2>

    <table class="min-w-full leading-normal">
      <thead>
        <tr>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] text-left text-base text-white uppercase tracking-wider">
            #
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] text-left text-base text-white uppercase tracking-wider">
            Extracurricular Name
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] text-left text-base text-white uppercase tracking-wider">
            Teacher
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] text-left text-base text-white uppercase tracking-wider">
            Location
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] text-left text-base text-white uppercase tracking-wider">
            Day
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-[#1E88E5] text-left text-base text-white uppercase tracking-wider">
            Time
          </th>
        </tr>
      </thead>

      <tbody>
        @forelse ($extracurriculars as $index => $extracurricular)
          <tr class="border-b">
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-base">{{ $index + 1 }}</td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-base">{{ $extracurricular->name }}</td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-base">{{ $extracurricular->teachers ?? '-' }}</td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-base">{{ $extracurricular->place ?? '-' }}</td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-base">{{ $extracurricular->day ?? '-' }}</td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-base">{{ $extracurricular->time ?? '-' }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="px-5 py-5 text-center text-gray-500">
              Kamu belum mengikuti ekskul apa pun.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>

  </div>
@endsection
