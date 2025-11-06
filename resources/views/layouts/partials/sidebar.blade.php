<aside :class="collapsed ? 'w-16' : 'w-60'"
  class="fixed top-0 left-0 h-screen bg-[#1E88E5] text-white flex flex-col text-sm z-50 transition-all duration-300">



  <!-- HEADER -->
  <div class="h-14 px-3 flex items-center justify-between">

    <div x-show="!collapsed" class="text-lg font-bold truncate">iConnect</div>

    <button @click="collapsed = !collapsed"
      class="w-8 h-8 flex items-center justify-center rounded hover:bg-[#2978BD] transition">
      <i class="bi bi-window-sidebar text-xl leading-none"></i>
    </button>

  </div>

  <!-- MENU -->
  <div class="px-3 py-2 mt-2">
    <div x-show="!collapsed" class="text-[10px] text-white/50 font-bold py-1">Main Menu</div>

    <ul class="space-y-1">
      <li class="group relative">
        <a href="{{ route('dashboard') }}"
          :class="[
              collapsed ? 'justify-center' : 'justify-start',
              '{{ request()->routeIs('dashboard') ? 'bg-[#1565C0] font-semibold' : '' }}',
              'flex items-center gap-3 px-3 py-2 rounded-md text-base transition hover:bg-[#2978BD]'
          ]">

          <i class="bi bi-speedometer2 text-lg w-6 text-center shrink-0"></i>
          <span x-show="!collapsed" x-transition class="truncate">Dashboard</span>
        </a>

        <span x-show="collapsed" x-cloak
          class="absolute left-full top-1/2 -translate-y-1/2 ml-2 whitespace-nowrap rounded-md px-3 py-1 text-sm 
        shadow-sm opacity-0 group-hover:opacity-100 bg-[#1E88E5]">
          Dashboard
        </span>
      </li>


      <li class="group relative">
        <a href="{{ route('extracurriculars') }}"
          :class="[
              collapsed ? 'justify-center' : 'justify-start',
              '{{ request()->routeIs('extracurriculars') ? 'bg-[#1565C0] font-semibold' : '' }}',
              'flex items-center gap-3 px-3 py-2 rounded-md text-base transition hover:bg-[#2978BD]'
          ]">
          <i class="bi bi-people text-lg w-6 text-center shrink-0"></i>
          <span x-show="!collapsed" x-transition class="truncate">Extracurricular</span>
        </a>

        <span x-show="collapsed" x-cloak
          class="absolute left-full top-1/2 -translate-y-1/2 ml-2 whitespace-nowrap rounded-md px-3 py-1 text-sm shadow-sm transition-opacity duration-150 opacity-0 group-hover:opacity-100 bg-[#1E88E5]">
          Extracurricular
        </span>
      </li>

      <li class="group relative">
        <a href="{{ route('room-reservations') }}"
          :class="[
              collapsed ? 'justify-center' : 'justify-start',
              '{{ request()->routeIs('room-reservations') ? 'bg-[#1565C0] font-semibold' : '' }}',
              'flex items-center gap-3 px-3 py-2 rounded-md text-base transition hover:bg-[#2978BD]'
          ]">
          <i class="bi bi-door-open text-lg w-6 text-center shrink-0"></i>
          <span x-show="!collapsed" x-transition class="truncate">Room Reservation</span>
        </a>

        <span x-show="collapsed" x-cloak
          class="absolute left-full top-1/2 -translate-y-1/2 ml-2 whitespace-nowrap rounded-md px-3 py-1 text-sm shadow-sm transition-opacity duration-150 opacity-0 group-hover:opacity-100 bg-[#1E88E5]">
          Room Reservation
        </span>
      </li>

      <li class="group relative">
        <a href="{{ route('lostfound.index') }}" :class="collapsed ? 'justify-center' : 'justify-start'"
          class="flex items-center gap-3 px-3 py-2 hover:bg-[#2978BD] rounded-md text-base transition">
          <i class="bi bi-search text-lg w-6 text-center shrink-0"></i>
          <span x-show="!collapsed" x-transition class="truncate">Lost &amp; Found</span>
        </a>

        <span x-show="collapsed" x-cloak
          class="absolute left-full top-1/2 -translate-y-1/2 ml-2 whitespace-nowrap rounded-md px-3 py-1 text-sm shadow-sm transition-opacity duration-150 opacity-0 group-hover:opacity-100 bg-[#1E88E5]">
          Lost &amp; Found
        </span>
      </li>

    </ul>
  </div>

  <div class="px-3 py-2 mt-3">
    <div x-show="!collapsed" class="text-[10px] text-white/50 font-bold py-1">OSIS</div>
    <ul class="space-y-1">
      <li class="group relative">
        <a href="#" :class="collapsed ? 'justify-center' : 'justify-start'"
          class="flex items-center gap-3 px-3 py-2 hover:bg-[#2978BD] rounded-md text-base transition">
          <i class="bi bi-box2 text-lg w-6 text-center shrink-0"></i>
          <span x-show="!collapsed" x-transition>Inventory</span>
        </a>
        <span x-show="collapsed" x-cloak
          class="absolute left-full top-1/2 -translate-y-1/2 ml-2 whitespace-nowrap rounded-md px-3 py-1 text-sm shadow-sm transition-opacity duration-150 opacity-0 group-hover:opacity-100 bg-[#1E88E5]">
          Inventory
        </span>
      </li>

      <li class="group relative">
        <a href="#" :class="collapsed ? 'justify-center' : 'justify-start'"
          class="flex items-center gap-3 px-3 py-2 hover:bg-[#2978BD] rounded-md text-base transition">
          <i class="bi bi-calendar-event text-lg w-6 text-center shrink-0"></i>
          <span x-show="!collapsed" x-transition>Meeting</span>
        </a>
        <span x-show="collapsed" x-cloak
          class="absolute left-full top-1/2 -translate-y-1/2 ml-2 whitespace-nowrap rounded-md px-3 py-1 text-sm shadow-sm transition-opacity duration-150 opacity-0 group-hover:opacity-100 bg-[#1E88E5]">
          Meeting
        </span>
      </li>
    </ul>
  </div>

  <div class="px-3 py-2 mt-3">
    <div x-show="!collapsed" class="text-[10px] text-white/50 font-bold py-1">Preference</div>
    <ul class="space-y-1">
      <li class="group relative">
        <a href="#" :class="collapsed ? 'justify-center' : 'justify-start'"
          class="flex items-center gap-3 px-3 py-2 hover:bg-[#2978BD] rounded-md text-base transition">
          <i class="bi bi-bell text-lg w-6 text-center shrink-0"></i>
          <span x-show="!collapsed" x-transition>Notification</span>
        </a>
        <span x-show="collapsed" x-cloak
          class="absolute left-full top-1/2 -translate-y-1/2 ml-2 whitespace-nowrap rounded-md px-3 py-1 text-sm shadow-sm transition-opacity duration-150 opacity-0 group-hover:opacity-100 bg-[#1E88E5]">
          Notification
        </span>
      </li>
    </ul>
  </div>

  <!-- PROFILE -->
  <div class="border-t border-blue-500 p-3 mt-auto relative" x-data="{ open: false }">
    <button @click="open = !open"
      class="flex items-center gap-3 w-full px-2 py-2 rounded-lg transition duration-200 text-white/90 hover:bg-[#2978BD]/60"
      :class="collapsed ? 'justify-center' : 'justify-start'">

      @if (auth()->user()->profile_photo)
        <img src="{{ asset('storage/profile_photos/' . auth()->user()->profile_photo) }}"
          :class="collapsed ? 'w-6 h-6' : 'w-8 h-8'" class="rounded-full object-cover border border-white/50 shadow-sm"
          alt="profile">
      @else
        <i class="bi bi-person-circle" :class="collapsed ? 'text-xl' : 'text-2xl'"></i>
      @endif

      <div x-show="!collapsed" x-transition class="flex-1 ml-2 text-left">
        <span class="font-semibold block truncate text-sm">
          {{ Auth::user()->display_name ?? Auth::user()->username }}
        </span>

        <span class="text-xs text-white/60">View account</span>
      </div>

      <i x-show="!collapsed" x-transition class="bi bi-chevron-right text-sm ml-auto transform"
        :class="{ 'rotate-90': open }"></i>
    </button>

    <!-- DROPDOWN -->
    <div x-show="open" x-transition @click.away="open = false" x-cloak
      :class="collapsed ? 'absolute bottom-8 left-full ml-2 w-48' : 'absolute bottom-18 left-2 w-[calc(100%-1rem)]'"
      class="bg-[#2978BD] rounded-xl shadow-lg overflow-hidden text-sm ring-1 ring-white/10 z-50">

      <a href="{{ route('profile') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-[#1E88E5]/90">
        <i class="bi bi-person text-base"></i> Profile
      </a>

      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="flex items-center gap-2 w-full text-left px-4 py-2 hover:bg-[#1E88E5]/90">
          <i class="bi bi-box-arrow-right text-base"></i> Logout
        </button>
      </form>
    </div>
  </div>
</aside>
