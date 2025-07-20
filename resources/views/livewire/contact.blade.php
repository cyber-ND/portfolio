<div>
    @section('content')
        <div>
            <div class="relative w-full min-h-screen bg-black overflow-hidden">
                <canvas id="letter-glitch-bg" class="absolute inset-0 w-full h-full"></canvas>
                
            </div>
        </div>
    @endsection
</div>

@push('scripts')
<script>
    const canvas = document.getElementById('letter-glitch-bg');
    const ctx = canvas.getContext('2d');

    const glitchColors = ['#a855f7', '#9333ea', '#d946ef']; // purple-400, purple-500, pink-500
    const glitchSpeed = 50;
    const smooth = true;
    const fontSize = 16;
    const charWidth = 10;
    const charHeight = 20;

    const lettersAndSymbols = [
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
        'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
        '!', '@', '#', '$', '&', '*', '(', ')', '-', '_', '+', '=', '/',
        '[', ']', '{', '}', ';', ':', '<', '>', ',', '0', '1', '2', '3',
        '4', '5', '6', '7', '8', '9'
    ];

    let letters = [];
    let grid = { columns: 0, rows: 0 };
    let lastGlitchTime = Date.now();

    function getRandomChar() {
        return lettersAndSymbols[Math.floor(Math.random() * lettersAndSymbols.length)];
    }

    function getRandomColor() {
        return glitchColors[Math.floor(Math.random() * glitchColors.length)];
    }

    function hexToRgb(hex) {
        const shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
        hex = hex.replace(shorthandRegex, (m, r, g, b) => r + r + g + g + b + b);
        const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        } : null;
    }

    function interpolateColor(start, end, factor) {
        const result = {
            r: Math.round(start.r + (end.r - start.r) * factor),
            g: Math.round(start.g + (end.g - start.g) * factor),
            b: Math.round(start.b + (end.b - start.b) * factor),
        };
        return `rgb(${result.r}, ${result.g}, ${result.b})`;
    }

    function calculateGrid(width, height) {
        const columns = Math.ceil(width / charWidth);
        const rows = Math.ceil(height / charHeight);
        return { columns, rows };
    }

    function initializeLetters(columns, rows) {
        grid = { columns, rows };
        const totalLetters = columns * rows;
        letters = Array.from({ length: totalLetters }, () => ({
            char: getRandomChar(),
            color: getRandomColor(),
            targetColor: getRandomColor(),
            colorProgress: 1,
        }));
    }

    function resize() {
        canvas.width = window.innerWidth * window.devicePixelRatio;
        canvas.height = document.documentElement.scrollHeight * window.devicePixelRatio;
        canvas.style.width = `${window.innerWidth}px`;
        canvas.style.height = `${document.documentElement.scrollHeight}px`;
        ctx.setTransform(window.devicePixelRatio, 0, 0, window.devicePixelRatio, 0, 0);
        const { columns, rows } = calculateGrid(window.innerWidth, document.documentElement.scrollHeight);
        initializeLetters(columns, rows);
        drawLetters();
    }

    function drawLetters() {
        if (!letters.length) return;
        const { width, height } = canvas.getBoundingClientRect();
        ctx.clearRect(0, 0, width, height);
        ctx.font = `${fontSize}px monospace`;
        ctx.textBaseline = 'top';

        letters.forEach((letter, index) => {
            const x = (index % grid.columns) * charWidth;
            const y = Math.floor(index / grid.columns) * charHeight;
            ctx.fillStyle = letter.color;
            ctx.fillText(letter.char, x, y);
        });
    }

    function updateLetters() {
        if (!letters.length) return;
        const updateCount = Math.max(1, Math.floor(letters.length * 0.05));
        for (let i = 0; i < updateCount; i++) {
            const index = Math.floor(Math.random() * letters.length);
            if (!letters[index]) continue;
            letters[index].char = getRandomChar();
            letters[index].targetColor = getRandomColor();
            if (!smooth) {
                letters[index].color = letters[index].targetColor;
                letters[index].colorProgress = 1;
            } else {
                letters[index].colorProgress = 0;
            }
        }
    }

    function handleSmoothTransitions() {
        let needsRedraw = false;
        letters.forEach((letter) => {
            if (letter.colorProgress < 1) {
                letter.colorProgress += 0.05;
                if (letter.colorProgress > 1) letter.colorProgress = 1;
                const startRgb = hexToRgb(letter.color);
                const endRgb = hexToRgb(letter.targetColor);
                if (startRgb && endRgb) {
                    letter.color = interpolateColor(startRgb, endRgb, letter.colorProgress);
                    needsRedraw = true;
                }
            }
        });
        if (needsRedraw) drawLetters();
    }

    function animate() {
        const now = Date.now();
        if (now - lastGlitchTime >= glitchSpeed) {
            updateLetters();
            drawLetters();
            lastGlitchTime = now;
        }
        if (smooth) handleSmoothTransitions();
        requestAnimationFrame(animate);
    }

    resize();
    window.addEventListener('resize', resize);
    animate();
</script>
@endpush