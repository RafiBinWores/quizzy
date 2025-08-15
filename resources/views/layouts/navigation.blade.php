<nav x-data="{ open: false }" class="bg-white shadow-lg border-b border-blue-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            {{-- LEFT: Logo and Links --}}
            <div class="flex items-center space-x-6">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center group">
                    <svg width="175" height="40" viewBox="0 0 185 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <ellipse cx="29" cy="24" rx="19" ry="19" fill="url(#quizzy-gradient)"/>
                        <path d="M26 39 Q28 41 34 43 Q31 40 33 36" fill="url(#quizzy-gradient)"/>
                        <text x="16" y="34" font-family="Arial Rounded MT Bold, Arial, sans-serif" font-size="33" font-weight="bold" fill="#fff">Q</text>
                        <circle cx="28" cy="39" r="2.1" fill="#fff" />
                        <!-- Brand name -->
                        <text x="60" y="36" font-family="Arial Rounded MT Bold, Arial, sans-serif" font-size="34" font-weight="bold" fill="#2D3190" letter-spacing="3">Quizzy</text>
                        <!-- Subtle underline under "Quizzy" -->
                        <rect x="60" y="39" width="90" height="4" rx="2" fill="url(#quizzy-gradient)" opacity="0.3"/>
                        <defs>
                          <linearGradient id="quizzy-gradient" x1="10" y1="7" x2="47" y2="47" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#6653FF"/>
                            <stop offset="1" stop-color="#00FFD1"/>
                          </linearGradient>
                        </defs>
                      </svg>
                </a>
                <!-- Desktop Nav Links -->
                <div class="hidden sm:flex items-center space-x-4">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Home') }}
                    </x-nav-link>

                    <a href="{{ route('quiz.results') }}"
                       class="font-medium transition px-2 py-1 flex items-center rounded-lg {{ request()->routeIs('quiz.results') ? 'text-blue-600' : 'hover:text-blue-600 text-gray-700 ' }}">
                        My Records
                    </a>
                </div>
            </div>

            {{-- RIGHT: User/Profile Dropdown --}}
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-blue-700 focus:outline-none transition duration-150 ease-in-out">
                            <div class="font-semibold">{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            <svg class="w-4 h-4 mr-2 inline text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                <svg class="w-4 h-4 mr-2 inline text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-blue-500 hover:text-white hover:bg-blue-500 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-blue-50 shadow-inner">
        <div class="pt-4 pb-3 px-4 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <svg class="w-5 h-5 inline mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5-8h2a2 2 0 012 2v7a2 2 0 01-2 2h-6a2 2 0 01-2-2v-2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('quiz.results')">
                <svg class="w-5 h-5 inline mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17v-2a4 4 0 118 0v2m-2-6V7a2 2 0 10-4 0v4m-2 0h8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                My Records
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('quiz.start')">
                <svg class="w-5 h-5 inline mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M14.752 11.168l-4.197-2.374A1 1 0 009 9.618v4.764a1 1 0 001.555.832l4.197-2.373a1 1 0 000-1.664z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
                Start Quiz
            </x-responsive-nav-link>
        </div>
        <div class="pt-4 pb-1 border-t border-blue-200 bg-blue-50">
            <div class="px-4 mb-2">
                <div class="font-medium text-base text-blue-900">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-blue-600">{{ Auth::user()->email }}</div>
            </div>
            <div class="space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    Profile
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
