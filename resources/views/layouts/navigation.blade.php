<div x-data="{ mobileOpen: false }">

    <!-- Mobile top bar -->
    <div class="sm:hidden flex items-center justify-between bg-[#47201B] px-4 py-3">
        <span class="text-white font-extrabold text-lg">JARA</span>
        <button @click="mobileOpen = !mobileOpen" class="text-white">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': mobileOpen}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': !mobileOpen}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Sidebar -->
    <aside
        :class="{'block': mobileOpen, 'hidden': !mobileOpen}"
        class="hidden sm:flex sm:flex-col w-64 shrink-0 bg-[#47201B] min-h-screen"
    >
        <div class="px-6 py-6 border-b border-white/10">
            <span class="text-white font-extrabold text-xl tracking-tight">JARA</span>
            <p class="text-white/50 text-xs mt-0.5">Advanced Todo List</p>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-1">
            <a href="{{ route('dashboard') }}"
                @class([
                    'flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition',
                    'bg-white/10 text-white' => request()->routeIs('dashboard'),
                    'text-white/70 hover:bg-white/5 hover:text-white' => !request()->routeIs('dashboard'),
                ])
            >
                Dashboard
            </a>

            @if (Auth::user()->role === 'admin')
                <a href="{{ route('admin.users.index') }}"
                    @class([
                        'flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition',
                        'bg-white/10 text-white' => request()->routeIs('admin.users.*'),
                        'text-white/70 hover:bg-white/5 hover:text-white' => !request()->routeIs('admin.users.*'),
                    ])
                >
                    Manajemen User
                </a>
            @endif
        </nav>

        <div class="px-4 py-6 border-t border-white/10">
            <x-dropdown align="left" width="56">
                <x-slot name="trigger">
                    <button class="w-full flex items-center justify-between px-4 py-2.5 rounded-xl text-white/80 hover:bg-white/5 hover:text-white transition text-sm font-medium">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </aside>

    <!-- Mobile menu -->
    <div :class="{'block': mobileOpen, 'hidden': !mobileOpen}" class="hidden sm:hidden bg-[#511E1D]">
        <nav class="px-4 py-4 space-y-1">
            <a href="{{ route('dashboard') }}" class="block px-4 py-2.5 rounded-xl text-sm font-medium text-white/80 hover:bg-white/5">
                Dashboard
            </a>
            @if (Auth::user()->role === 'admin')
                <a href="{{ route('admin.users.index') }}" class="block px-4 py-2.5 rounded-xl text-sm font-medium text-white/80 hover:bg-white/5">
                    Manajemen User
                </a>
            @endif
            <a href="{{ route('profile') }}" class="block px-4 py-2.5 rounded-xl text-sm font-medium text-white/80 hover:bg-white/5">
                Profile
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2.5 rounded-xl text-sm font-medium text-white/80 hover:bg-white/5">
                    Log Out
                </button>
            </form>
        </nav>
    </div>
</div>