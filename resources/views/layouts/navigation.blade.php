<nav x-data="{ open: false }" class="bg-gradient-to-br from-[#2B2D42] to-[#1A1B2E] backdrop-blur-xl border-b border-white/10 sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                        <div class="bg-white/5 backdrop-blur-sm p-2.5 rounded-xl border border-white/10 group-hover:bg-white/10 group-hover:border-white/20 transition-all duration-300">
                            <i class="fas fa-tasks text-2xl text-[#6C63FF] group-hover:scale-110 transition-transform"></i>
                        </div>
                        <span class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-300">TareKar</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" 
                        class="px-4 py-2 rounded-lg text-white/80 hover:text-white hover:bg-white/5 border border-transparent hover:border-white/10 transition-all duration-300 flex items-center space-x-2 {{ request()->routeIs('home') ? 'bg-white/10 border-white/20 text-white' : '' }}">
                        <i class="fas fa-home text-[#6C63FF]"></i>
                        <span>{{ __('Inicio') }}</span>
                    </x-nav-link>
                    
                    <x-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')"
                        class="px-4 py-2 rounded-lg text-white/80 hover:text-white hover:bg-white/5 border border-transparent hover:border-white/10 transition-all duration-300 flex items-center space-x-2 {{ request()->routeIs('tasks.*') ? 'bg-white/10 border-white/20 text-white' : '' }}">
                        <i class="fas fa-clipboard-list text-[#6C63FF]"></i>
                        <span>{{ __('Tareas') }}</span>
                    </x-nav-link>
                    
                    <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')"
                        class="px-4 py-2 rounded-lg text-white/80 hover:text-white hover:bg-white/5 border border-transparent hover:border-white/10 transition-all duration-300 flex items-center space-x-2 {{ request()->routeIs('categories.*') ? 'bg-white/10 border-white/20 text-white' : '' }}">
                        <i class="fas fa-tags text-[#6C63FF]"></i>
                        <span>{{ __('Categorías') }}</span>
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="group inline-flex items-center px-4 py-2 bg-white/5 border border-white/10 backdrop-blur-sm text-sm font-medium rounded-lg text-white hover:bg-white/10 hover:border-white/20 focus:outline-none transition-all duration-300">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-user-circle text-xl text-[#6C63FF] group-hover:scale-110 transition-transform duration-300"></i>
                                <span class="text-white/90">{{ Auth::user()->name ?? 'Guest' }}</span>
                                <i class="fas fa-chevron-down text-sm text-white/70 group-hover:rotate-180 transition-transform duration-300"></i>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-[#2B2D42]/95 backdrop-blur-xl border border-white/10 rounded-lg shadow-xl">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                        class="flex items-center space-x-2 px-4 py-3 text-white/80 hover:text-white hover:bg-white/10 transition-colors rounded-lg">
                                    <i class="fas fa-sign-out-alt text-[#6C63FF]"></i>
                                    <span>{{ __('Cerrar Sesión') }}</span>
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-white hover:bg-white/10 transition-colors">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')"
                class="flex items-center space-x-2 px-4 py-2 text-white/80 hover:text-white hover:bg-white/10 transition-colors">
                <i class="fas fa-home text-[#6C63FF]"></i>
                <span>{{ __('Inicio') }}</span>
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')"
                class="flex items-center space-x-2 px-4 py-2 text-white/80 hover:text-white hover:bg-white/10 transition-colors">
                <i class="fas fa-clipboard-list text-[#6C63FF]"></i>
                <span>{{ __('Tareas') }}</span>
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')"
                class="flex items-center space-x-2 px-4 py-2 text-white/80 hover:text-white hover:bg-white/10 transition-colors">
                <i class="fas fa-tags text-[#6C63FF]"></i>
                <span>{{ __('Categorías') }}</span>
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-white/10">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name ?? 'Guest' }}</div>
                <div class="font-medium text-sm text-white/70">{{ Auth::user()->email ?? '' }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="flex items-center space-x-2 px-4 py-2 text-white/80 hover:text-white hover:bg-white/10 transition-colors">
                        <i class="fas fa-sign-out-alt text-[#6C63FF]"></i>
                        <span>{{ __('Cerrar Sesión') }}</span>
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

@push('styles')
<style>
    /* Efecto de desenfoque para el dropdown */
    .dropdown-menu {
        backdrop-filter: blur(16px);
    }

    /* Animación suave para los íconos */
    .nav-link i, .responsive-nav-link i {
        transition: transform 0.3s ease;
    }

    .nav-link:hover i, .responsive-nav-link:hover i {
        transform: scale(1.1);
    }
</style>
@endpush
