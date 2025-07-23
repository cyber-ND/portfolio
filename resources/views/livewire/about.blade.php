{{-- @extends('layouts.app') --}}

<div>
    @section('content')
        <div>
            <div class="relative w-full min-h-screen bg-black overflow-hidden">
                <canvas id="squares-bg" class="absolute inset-0 w-full h-full"></canvas>
                <div class="text-center text-3xl lg:text-5xl font-bold text-purple-400 mt-8">
                    <x-decrypted-text>I AM A FULL-STACK DEVELOPER</x-decrypted-text>
                </div>
                <div
                    class="flex flex-col lg:flex-row w-full bg-transparent text-gray-200 px-4 sm:px-8 pt-16 lg:pb-1 gap-6">
                    <!-- About Me -->
                    <div class="w-full lg:w-1/2">
                        <h2 class="text-2xl sm:text-3xl font-bold mb-2 text-purple-400">About Me</h2>
                        <p class="text-base sm:text-lg leading-relaxed">
                            I'm a full-stack web developer with a passion for Web3 and a keen eye for aesthetics. My
                            expertise lies in crafting dynamic interfaces with <span
                                class="text-teal-400 font-semibold">Vue.js</span> (80% of my front-end work) and robust
                            back-ends with <span class="text-yellow-400 font-semibold">Laravel and Livewire</span> (94%
                            proficiency). I prioritize responsive, accessible, and clean UI, leveraging my 95% mastery of
                            <span class="text-sky-400 font-semibold">Tailwind CSS</span> for pixel-perfect, lean designs.
                            <br><br>
                            Beyond coding, I'm deeply engaged in crypto market <span
                                class="text-rose-400 font-semibold">technical analysis</span> and <span
                                class="text-rose-400 font-semibold">fundamental research</span> (90% proficiency each). This
                            analytical mindset enhances my ability to build intuitive tools and dashboards for traders. When
                            not coding or analyzing markets, I unwind through <span
                                class="text-indigo-400 font-semibold">photography and video editing</span>, which sharpens
                            my attention to detail and infuses creativity into every project.
                        </p>
                    </div>

                    <!-- Animated Vertical Divider -->
                    <div class="hidden lg:flex justify-center items-start mt-3">
                        <div
                            class="w-px h-[400px] bg-gradient-to-b from-purple-500 via-purple-300 to-purple-500 animate-pulse">
                        </div>
                    </div>

                    <!-- Experience -->
                    <div class="w-full lg:w-1/2">
                        <h2 class="text-2xl sm:text-3xl font-bold mb-2 text-purple-400">Experience</h2>
                        <p class="text-base sm:text-lg leading-relaxed">
                            I've honed my skills through diverse web projects, building reactive dashboards with <span
                                class="text-teal-400 font-semibold">Vue.js</span> and scalable back-ends with <span
                                class="text-yellow-400 font-semibold">Laravel and Livewire</span>. My workflow emphasizes
                            modularity and reusability for easy maintenance. Using <span
                                class="text-sky-400 font-semibold">Tailwind CSS</span>, I deliver responsive,
                            high-performance UI for admin panels, landing pages, and Web3 apps like basic NFT galleries and
                            crypto trackers.
                            <br><br>
                            My expertise in crypto <span class="text-rose-400 font-semibold">technical analysis</span> and
                            <span class="text-rose-400 font-semibold">fundamental research</span> informs my development of
                            DeFi tools, with insights into tokenomics and market patterns. My interdisciplinary
                            approach—blending development, analysis, and creativity—enables me to create user-centric,
                            adaptable, and visually appealing solutions that align with cutting-edge trends.
                        </p>
                    </div>
                </div>

                <!-- Skill Bar Section -->
                <div class="relative px-4 sm:px-8 py-16  lg:py-6">
                    <x-skill-bar name="Laravel/Livewire" percent="90" />
                    <x-skill-bar name="TailwindCss" percent="93" />
                    <x-skill-bar name="Vue.js" percent="70" />
                    <x-skill-bar name="Technical Analysis" percent="85" />
                    <x-skill-bar name="Research/Fundamental Analysis" percent="95" />
                </div>
            </div>
        </div>
    @endsection
</div>

@push('scripts')
    <script>
        const canvas = document.getElementById('squares-bg');
        const ctx = canvas.getContext('2d');

        function resize() {
            canvas.width = window.innerWidth;
            canvas.height = document.documentElement.scrollHeight;
        }
        resize();
        window.addEventListener('resize', resize);

        class Square {
            constructor() {
                this.reset();
            }
            reset() {
                this.size = Math.random() * 30 + 10;
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.speedX = (Math.random() - 0.5) * 0.5;
                this.speedY = (Math.random() - 0.5) * 0.5;
                this.opacity = Math.random() * 0.4 + 0.2;
                this.color = '#BF40FF';
            }
            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                if (this.x < -this.size || this.x > canvas.width + this.size ||
                    this.y < -this.size || this.y > canvas.height + this.size) {
                    this.reset();
                }
            }
            draw() {
                ctx.fillStyle = this.color;
                ctx.globalAlpha = this.opacity;
                ctx.fillRect(this.x, this.y, this.size, this.size);
            }
        }

        const squares = Array.from({
            length: 50
        }, () => new Square());

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            squares.forEach(s => {
                s.update();
                s.draw();
            });
            requestAnimationFrame(animate);
        }
        animate();
    </script>
@endpush
