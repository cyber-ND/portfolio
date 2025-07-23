<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BranyCyber's Portfolio</title>
    @vite('resources/css/app.css')
    @livewireStyles
    @stack('styles')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @keyframes typing {
            from { width: 0 }
            to { width: 11ch }
        }

        @keyframes blink {
            0%, 100% { border-color: transparent; }
            50% { border-color: white; }
        }
    </style>
</head>
<body class="min-h-screen bg-black text-white max-w-[100vw] overflow-x-hidden">

    <nav x-data="{ open: false }" class="p-4 flex justify-between items-center relative z-50">
        <div class="text-purple-400 text-3xl font-mono overflow-hidden whitespace-nowrap w-[11ch] border-r-4 border-white
            animate-[typing_2s_steps(11)_forwards] after:content-[''] after:inline-block after:h-full after:w-[2px]
            after:bg-white after:animate-[blink_0.7s_step-end_3] after:ml-[-2px]">
            BrainyCyber
        </div>

        <!-- Hamburger -->
        <button @click="open = !open" class="lg:hidden text-white focus:outline-none z-50 relative">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round"
                    d="M4 6h16M4 12h16M4 18h16" />
                <path x-show="open" stroke-linecap="round" stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Desktop Nav -->
        <div class="hidden lg:flex space-x-6">
            @foreach ([
                ['name' => 'Home', 'route' => route('home')],
                ['name' => 'About', 'route' => route('about')],
                ['name' => 'Projects', 'route' => route('projects')],
                ['name' => 'Contact', 'route' => route('contact')],
            ] as $link)
                <a href="{{ $link['route'] }}"
                   class="relative px-6 py-3 text-white group overflow-hidden isolate
                          skew-x-[-10deg] before:absolute before:inset-0 before:rounded-sm
                          before:bg-gradient-to-r before:from-purple-500 before:via-pink-500 before:to-purple-500
                          before:animate-spin before:z-[-1] before:blur-sm before:opacity-40
                          backdrop-blur-md border border-purple-500 shadow-[0_0_20px_#9333ea]
                          transition-transform duration-300 hover:scale-105 hover:text-pink-300">
                    <span class="skew-x-[10deg] relative z-10">{{ $link['name'] }}</span>
                </a>
            @endforeach
        </div>

        <div id="profile-circle" class="hidden lg:block"></div>

        <!-- Slide-in Mobile Nav -->
        <div x-show="open" x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
             class="fixed top-0 right-0 h-full w-64 bg-black shadow-lg border-l border-purple-600 z-40 p-6 flex flex-col space-y-4 lg:hidden">
            <button @click="open = false" class="self-end mb-4 text-white">
                ✕
            </button>
            @foreach ([
                ['name' => 'Home', 'route' => route('home')],
                ['name' => 'About', 'route' => route('about')],
                ['name' => 'Projects', 'route' => route('projects')],
                ['name' => 'Contact', 'route' => route('contact')],
            ] as $link)
                <a href="{{ $link['route'] }}"
                   class="block px-4 py-2 rounded-md border border-purple-600 text-white bg-black hover:bg-purple-800 transition">
                    {{ $link['name'] }}
                </a>
            @endforeach
        </div>

    </nav>

    <main class="relative flex-1">
        @yield('content') 
    </main>

    @stack('scripts')
    @livewireScripts
</body>
</html>
