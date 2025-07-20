@props([
    'name' => 'Skill',
    'percent' => 0
])

<div class="space-y-4 bg-transparent">
    <h1 class="text-[20px] mb-[12px] text-gray-300 font-bold">{{ $name }}</h1>
    <div class="w-[100%] h-[5px] rounded-full bg-gray-300 relative group">
        <div
            class="h-[5px] rounded-full bg-purple-500 relative js-progress-bar"
            data-width="{{ $percent }}%"
            style="width: 0%">
            <span class="absolute invisible group-hover:visible w-[40px] bg-purple-500 text-white text-xs text-center py-[2px] top-full right-[-19px] mt-[6px] tooltip-hex">
                {{ $percent }}%
                <span class="absolute bottom-full left-1/2 -translate-x-1/2 border-[5px] border-transparent border-b-purple-500"></span>
            </span>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const progressBars = document.querySelectorAll('.js-progress-bar');
            progressBars.forEach(bar => {
                const targetWidth = bar.getAttribute('data-width');
                bar.style.width = '0%';
                bar.animate([
                    { width: '0%' },
                    { width: targetWidth }
                ], {
                    duration: 1500,
                    easing: 'ease-out',
                    fill: 'forwards'
                });
            });
        });
    </script>
</div>
