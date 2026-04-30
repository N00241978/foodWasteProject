<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-emerald-950 border-b border-emerald-800 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            {{-- Logo / Brand --}}
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-full bg-lime-300 flex items-center justify-center text-xl">
                        🌱
                    </div>
                    <div>
                        <p class="text-lg font-extrabold text-white leading-none">
                            FoodSaver
                        </p>
                        <p class="text-xs text-lime-200">
                            Reduce waste locally
                        </p>
                    </div>
                </a>

                {{-- Navigation Links --}}
                <div class="hidden space-x-2 sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('surplus-listing.index')" :active="request()->routeIs('surplus-listing.*')">
                        {{ __('Surplus Food') }}
                    </x-nav-link>

                    <x-nav-link :href="route('business.index')" :active="request()->routeIs('business.*')">
                        {{ __('Local Businesses') }}
                    </x-nav-link>

                    <x-nav-link :href="route('carts.show')" :active="request()->routeIs('carts.show')">
                        {{ __('Basket') }}
                    </x-nav-link>
                </div>
            </div>

            {{-- User Dropdown --}}
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold text-emerald-950 bg-lime-300 hover:bg-lime-200 transition">
                            <span>{{ Auth::user()->name }}</span>

                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            {{-- Hamburger --}}
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-xl text-lime-200 hover:text-white hover:bg-emerald-800 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    {{-- Mobile Menu --}}
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-emerald-950 border-t border-emerald-800">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('surplus-listing.index')" :active="request()->routeIs('surplus-listing.*')">
                {{ __('Surplus Food') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('business.index')" :active="request()->routeIs('business.*')">
                {{ __('Local Businesses') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('carts.show')" :active="request()->routeIs('carts.show')">
                {{ __('Basket') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-emerald-800">
            <div class="px-4">
                <div class="font-bold text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-lime-200">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>