@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <div class="bg-white rounded-xl shadow p-6 mb-6">
    <div class="flex items-start justify-between">
      <div>
        <div class="font-semi-bold text-xl text-gray-800">Good Evening,</div>
        <div class="font-bold text-2xl text-gray-800">Princely Nathaniel</div>
      </div>
    </div>
  </div>
  <div class="p-6 mt-6">
    <img src="{{ asset('img/picture.png') }}" alt="Illustration" class="w-full h-auto object-cover rounded-lg">
  </div>
  <div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-xl font-semibold mb-4">Your Schedules</h2>
    <table class="min-w-full leading-normal">
      <thead>
        <tr>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-blue-500 text-left text-xs font-semibold text-white uppercase tracking-wider">
            #
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-blue-500 text-left text-xs font-semibold text-white uppercase tracking-wider">
            Subject
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-blue-500 text-left text-xs font-semibold text-white uppercase tracking-wider">
            Type
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-blue-500 text-left text-xs font-semibold text-white uppercase tracking-wider">
            Description
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-blue-500 text-left text-xs font-semibold text-white uppercase tracking-wider">
            Status
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-blue-500 text-left text-xs font-semibold text-white uppercase tracking-wider">
            Date / Deadline
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-blue-500 text-left text-xs font-semibold text-white uppercase tracking-wider">
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">1</td>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Name</td>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Project</td>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">PL</td>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
              <span aria-hidden="true" class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
              <span class="relative">Done</span>
            </span>
          </td>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">13 August 2025</td>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <button class="text-red-500 hover:text-red-700">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M9 2a1 1 0 00-1 1v1H5a1 1 0 000 2h1v10a2 2 0 002 2h4a2 2 0 002-2V6h1a1 1 0 100-2h-3V3a1 1 0 00-1-1H9zM7 6h6v10H7V6z"
                  clip-rule="evenodd" />
              </svg>
            </button>
            <button class="text-blue-500 hover:text-blue-700 ml-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path
                  d="M13.586 3.586a2 2 0 112.828 2.828L15 8.414V16a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2h8.586l.293-.293zM10 13a1 1 0 00-1 1v1a1 1 0 102 0v-1a1 1 0 00-1-1z" />
              </svg>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="text-center mt-6">
      <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
        Add
      </button>
    </div>
  </div>


@endsection
