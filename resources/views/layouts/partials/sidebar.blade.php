<aside class="fixed top-0 left-0 h-screen w-60 bg-blue-600 text-white flex flex-col text-sm z-50" x-data="{ open: false }">
  <div class="p-3 text-lg font-bold">iConnect</div>

  <ul class="space-y-1 px-3">
    <li><a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-blue-700 rounded-md text-base">Dashboard</a>
    </li>
    <li><a href="#" class="block px-4 py-2 hover:bg-blue-700 rounded-md text-base">Extracurricular</a></li>
    <li><a href="#" class="block px-4 py-2 hover:bg-blue-700 rounded-md text-base">Room Reservation</a></li>
    <li><a href="{{ route('lostfound.index') }}" class="block px-4 py-2 hover:bg-blue-700 rounded-md text-base">Lost &
        Found</a>
    </li>
    <li><a href="#" class="block px-3 py-2 hover:bg-blue-700 rounded-md text-base">Users</a></li>
  </ul>

  <div class="px-4 py-2 border-t border-blue-500 mt-2">
    <div class="text-[12px] text-white/50 font-bold uppercase">OSIS</div>
    <ul>
      <li><a href="#" class="block px-4 py-2 hover:bg-blue-700 rounded-md text-base">Inventory</a></li>
      <li><a href="#" class="block px-4 py-2 hover:bg-blue-700 rounded-md text-base">Meeting</a></li>
    </ul>
  </div>

  <div class="px-4 py-2 border-t border-blue-500 mt-2">
    <div class="text-[12px] text-white/50 font-bold uppercase">Preferences</div>
    <ul>
      <li><a href="{{ route('notification.index') }}"
          class="block px-4 py-2 hover:bg-blue-700 rounded-md text-base">Notification</a></li>
    </ul>
  </div>

  <!-- Profile Section -->
  <div class="border-t border-blue-500 p-3 mt-auto relative" x-data="{ open: false }">
    <button @click="open = !open" class="flex items-center space-x-2 text-white/90 hover:text-white w-full text-sm">
      <img src="{{ asset('img/profile.png') }}" alt="Princely" class="w-7 h-7 rounded-full border border-white">
      <span class="font-semibold truncate">{{ Auth::user()->name }}</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto transform"
        :class="{ 'rotate-90': open, 'rotate-0': !open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
    </button>

    <!-- Dropdown -->
    <div x-show="open" x-cloak @click.away="open = false"
      class="absolute bottom-12 left-0 w-full bg-blue-700 rounded-md shadow-lg overflow-hidden text-sm">
      <a href="#" class="block px-4 py-2 hover:bg-blue-600">Profile</a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-blue-600">Logout</button>
      </form>
    </div>
  </div>
</aside>
