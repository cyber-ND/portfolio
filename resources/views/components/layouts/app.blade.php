<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BranyCyber's Portfolio</title>
    @vite('resources/css/app.css')
    @livewireStyles
    @stack('styles')
    <style>
@keyframes typing {
  from { width: 0 }
  to { width: 11ch } /* Adjust to length of your text */
}

@keyframes blink {
  0%, 100% { border-color: transparent; }
  50% { border-color: white; }
}

</style>


</head>
<body class="min-h-screen bg-black text-white max-w-[100vw] overflow-x-hidden">
    <nav class="p-4 flex justify-between items-center">
        <div class="text-purple-400 text-3xl font-mono overflow-hidden whitespace-nowrap w-[11ch] border-r-4 border-white
            animate-[typing_2s_steps(11)_forwards] after:content-[''] after:inline-block after:h-full after:w-[2px]
            after:bg-white after:animate-[blink_0.7s_step-end_3] after:ml-[-2px]">
            BrainyCyber
        </div>
        <div class="flex space-x-6 ">
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

                <div id="profile-circle"></div>
    </nav>

    <main class="relative flex-1">
        @yield('content') {{-- ✅ Corrected --}}
    </main>

    @livewireScripts
    @stack('scripts')
</body>
</html>
