@props(['text', 'speed' => 50])

<span
    x-data="{
        original: `{!! $text ?? trim(preg_replace('/\s+/', ' ', strip_tags($slot))) !!}`,
        display: '',
        chars: 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',
        i: 0,
        interval: null,
        init() {
            this.interval = setInterval(() => {
                this.display = this.original.split('').map((c, idx) =>
                    idx < this.i ? c : this.chars[Math.floor(Math.random() * this.chars.length)]
                ).join('');
                if (this.i++ >= this.original.length) clearInterval(this.interval);
            }, {{ $speed }});
        }
    }"
    x-init="init()"
    x-text="display"
    {{ $attributes }}
></span>


{{-- Optional: Alpine CDN (only if not globally loaded) --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
