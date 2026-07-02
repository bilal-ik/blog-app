<nav x-data="{ open: false }" class="bg-slate-900 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">

                {{-- Logo --}}
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 mr-8">
                    <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center">
                        <span class="text-white font-black text-sm">B</span>
                    </div>
                    <span class="text-white font-bold text-lg">BlogApp</span>
                </a>

                {{-- Desktop Nav Links --}}
                <div class="hidden sm:flex sm:items-center sm:gap-1">
                    <a href="{{ route('dashboard') }}"
                       class="{{ request()->routeIs('dashboard') ? 'bg-slate-700 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }} px-4 py-2 rounded-lg text-sm font-medium transition">
                        Dashboard
                    </a>
                    <a href="{{ route('posts.index') }}"
                       class="{{ request()->routeIs('posts.*') ? 'bg-slate-700 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }} px-4 py-2 rounded-lg text-sm font-medium transition">
                        Posts
                    </a>
                    <a href="{{ route('stories.index') }}"
                       class="{{ request()->routeIs('stories.*') ? 'bg-slate-700 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }} px-4 py-2 rounded-lg text-sm font-medium transition">
                        Stories
                    </a>
                    <a href="{{ route('short-videos.index') }}"
                       class="{{ request()->routeIs('short-videos.*') ? 'bg-slate-700 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }} px-4 py-2 rounded-lg text-sm font-medium transition">
                        Shorts
                    </a>
                </div>
            </div>

            {{-- Right side --}}
            <div class="hidden sm:flex sm:items-center sm:gap-3">

                {{-- New Post quick button --}}
                <a href="{{ route('posts.create') }}"
                   class="bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-semibold px-4 py-2 rounded-full transition">
                    + New Post
                </a>

                {{-- User dropdown --}}
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-2 bg-slate-800 hover:bg-slate-700 text-white text-sm px-3 py-2 rounded-full transition">
                            <div class="w-6 h-6 rounded-full bg-indigo-500 flex items-center justify-center text-xs font-bold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span class="text-slate-300 text-xs">{{ Auth::user()->name }}</span>
                            <svg class="fill-current h-3 w-3 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
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

            {{-- Mobile hamburger --}}
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-white hover:bg-slate-700 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-slate-800 border-t border-slate-700">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'text-white bg-slate-700' : 'text-slate-400' }} block px-3 py-2 rounded-lg text-sm font-medium">
                Dashboard
            </a>
            <a href="{{ route('posts.index') }}"
               class="{{ request()->routeIs('posts.*') ? 'text-white bg-slate-700' : 'text-slate-400' }} block px-3 py-2 rounded-lg text-sm font-medium">
                Posts
            </a>
            <a href="{{ route('stories.index') }}"
               class="{{ request()->routeIs('stories.*') ? 'text-white bg-slate-700' : 'text-slate-400' }} block px-3 py-2 rounded-lg text-sm font-medium">
                Stories
            </a>
            <a href="{{ route('short-videos.index') }}"
               class="{{ request()->routeIs('short-videos.*') ? 'text-white bg-slate-700' : 'text-slate-400' }} block px-3 py-2 rounded-lg text-sm font-medium">
                Shorts
            </a>
        </div>
        <div class="pt-4 pb-3 border-t border-slate-700 px-4">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center text-white font-bold text-sm">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <p class="text-white text-sm font-medium">{{ Auth::user()->name }}</p>
                    <p class="text-slate-400 text-xs">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <a href="{{ route('profile.edit') }}" class="block text-slate-400 text-sm py-2">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-slate-400 text-sm py-2">Log Out</button>
            </form>
        </div>
    </div>
</nav>
