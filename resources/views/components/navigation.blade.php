<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @if(Auth::user())
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @endif
                    <x-nav-link :href="route('news')" :active="request()->routeIs('news')">
                        {{ __('News') }}
                    </x-nav-link>
                    <x-nav-link :href="route('politics')" :active="request()->routeIs('politics')">
                        {{ __('Politics') }}
                    </x-nav-link>
                    <x-nav-link :href="route('world-news')" :active="request()->routeIs('world-news')">
                        {{ __('World News') }}
                    </x-nav-link>
                    <x-nav-link :href="route('business')" :active="request()->routeIs('business')">
                        {{ __('Business') }}
                    </x-nav-link>
                    <x-nav-link :href="route('sports')" :active="request()->routeIs('sports')">
                        {{ __('Sports') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @if (!Auth::user())
                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                    <a class="ml-1" href={{ route('login') }}>
                        <svg height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs><style>.fa-secondary{opacity:.4}</style></defs><path d="M96 480H160C177.673 480 192 465.673 192 448V448C192 430.327 177.673 416 160 416H96C78.327 416 64 401.673 64 384V128C64 110.327 78.327 96 96 96H160C177.673 96 192 81.673 192 64V64C192 46.327 177.673 32 160 32H96C42.981 32 0 74.981 0 128V384C0 437.019 42.981 480 96 480Z" class="fa-secondary"/><path d="M504.73 273.451L360.629 409.451C353.654 416.029 343.428 417.826 334.625 414.045C325.822 410.248 320.115 401.576 320.115 391.998V319.998H192.023C174.336 319.998 160 305.672 160 287.998V223.998C160 206.326 174.336 191.998 192.023 191.998H320.115V119.998C320.115 110.42 325.822 101.748 334.625 97.951C343.428 94.17 353.654 95.967 360.629 102.545L504.73 238.545C514.332 247.607 514.332 264.389 504.73 273.451Z" class="fa-primary"/></svg>
                    </a>
                </button>
                @else
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>

                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <a @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if(Auth::user())
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @endif
            <x-responsive-nav-link :href="route('news')" :active="request()->routeIs('news')">
                {{ __('News') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('politics')" :active="request()->routeIs('politics')">
                {{ __('Politics') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('world-news')" :active="request()->routeIs('world-news')">
                {{ __('World News') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('business')" :active="request()->routeIs('business')">
                {{ __('Business') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('sports')" :active="request()->routeIs('sports')">
                {{ __('Sports') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @if (Auth::user())
                <div class="px-4 mb-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            @endif
            <div class="space-y-1">
                <!-- Authentication -->
                @if (!Auth::user())
                    <x-responsive-nav-link :href="route('login')">
                        {{ __('Log In') }}
                    </x-responsive-nav-link>
                @else
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                @endif
            </div>
        </div>
    </div>
</nav>
