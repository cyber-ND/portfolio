{{-- @extends('components.layouts.main-layout') --}}

<div>
    @section('content')
        {{-- Particle container --}}
        <div id="tsparticles" class="absolute inset-0 -z-10"></div>

        {{-- Main Content --}}
        <div class="min-h-screen flex flex-col-reverse lg:flex-row items-center justify-center px-4 sm:px-6 md:px-8">
            <div class="w-full lg:w-1/2 text-center mb-6 md:mb-0">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-purple-400  my-4">WEB3 DEVELOPER</h1>
                <div class="text-gray-300 mb-6 font-bold text-lg sm:text-xl md:text-2xl text-left overflow-x-hidden">
                    <x-decrypted-text>
                        <span class="text-purple-400">BrainyCyber</span> isn’t just a name — it’s a mindset where crypto
                        meets clarity.
                        A sharp, fast-moving presence in the Web3 space, <span class="text-purple-400">BrainyCyber</span>
                        blends the instincts of an alpha trader,
                        the precision of a researcher, and the craftsmanship of a seasoned web developer. Every project
                        reflects a deep obsession with code, strategy,
                        and market rhythm — not just to build, but to outpace. In a space defined by noise and chaos, <span
                            class="text-purple-400">BrainyCyber</span> is the clear signal — methodical, creative, and
                        relentlessly forward-thinking.
                        This isn’t just freelance — this is a personality engineered for Web3.
                    </x-decrypted-text>
                </div>
                {{-- <button class="bg-purple-600 hover:bg-white/5 text-white px-4 sm:px-6 py-2 rounded">EXPLORE MORE</button> --}}
            </div>
            <div class="w-full lg:w-1/2 flex justify-center mt-6 md:mt-0 relative" id="profile-circle-container">
                <div class="h-[300px] sm:h-[400px] md:h-[600px] w-full sm:w-4/5 relative overflow-hidden rounded-lg">
                    <img src="{{ asset('images/port-pfp.jpg') }}" alt="" class="h-full w-full object-cover">
                    <div class="absolute inset-0 border-4 border-white rounded-lg" id="moving-border"></div>
                </div>
            </div>
        </div>
        <div class="flex flex-col sm:flex-row gap-4 sm:gap-5 mx-4 sm:mx-6 my-6">
            <div
                class="bg-white/5 border border-white/10 rounded-2xl shadow-md p-4 sm:p-6 transition-all duration-300 hover:shadow-lg hover:scale-[1.02]">
                <h3 class="text-purple-400 text-lg sm:text-xl font-semibold mb-2">WEB DEVELOPER</h3>
                <p class="text-gray-300 text-sm sm:text-base leading-relaxed">
                    Clean code, intuitive layouts, and performance-first design.
                    Built for dark UI, Web3 speed, and modern developer style.
                </p>
            </div>
            <div
                class="bg-white/5 border border-white/10 rounded-2xl shadow-md p-4 sm:p-6 transition-all duration-300 hover:shadow-lg hover:scale-[1.02]">
                <h3 class="text-purple-400 text-lg sm:text-xl font-semibold mb-2">ALPHA TRADER</h3>
                <p class="text-gray-300 text-sm sm:text-base leading-relaxed">
                    Sharp instincts, data-driven moves, and on-chain speed.
                    Built for dark UIs and the fast lane of modern crypto trading.
                </p>
            </div>
            <div
                class="bg-white/5 border border-white/10 rounded-2xl shadow-md p-4 sm:p-6 transition-all duration-300 hover:shadow-lg hover:scale-[1.02]">
                <h3 class="text-purple-400 text-lg sm:text-xl font-semibold mb-2">RESEARCH ANALYST</h3>
                <p class="text-gray-300 text-sm sm:text-base leading-relaxed">
                    Deep dives, smart data, and signal over noise.
                    Tailored for dark UIs and sharp minds decoding Web3 trends and tech.
                </p>
            </div>
        </div>
    @endsection
</div>


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2/tsparticles.bundle.min.js"></script>
    <script>
        tsParticles.load("tsparticles", {
            background: {
                color: "#000000"
            },
            fpsLimit: 60,
            particles: {
                number: {
                    value: 80
                },
                color: {
                    value: "#BF40FF"
                }, // Neon Purple
                shape: {
                    type: "circle"
                },
                opacity: {
                    value: 0.4
                },
                size: {
                    value: {
                        min: 1,
                        max: 3
                    }
                },
                move: {
                    enable: true,
                    speed: 1.5,
                    direction: "none",
                    outModes: {
                        default: "bounce"
                    },
                }
            },
            interactivity: {
                events: {
                    onHover: {
                        enable: true,
                        mode: "repulse"
                    },
                    onClick: {
                        enable: true,
                        mode: "push"
                    },
                },
                modes: {
                    repulse: {
                        distance: 100
                    },
                    push: {
                        quantity: 4
                    },
                },
            },
            detectRetina: true,
        });

        // Internal JS for moving border animation
        const border = document.getElementById('moving-border');
        let rotation = 0;

        function rotate() {
            rotation = (rotation + 1) % 360;
            border.style.transform = `rotate(${rotation}deg)`;
            border.style.transformOrigin = "center center";
            requestAnimationFrame(rotate);
        }

        rotate(); // Start the animation once
    </script>
@endpush


{{-- @push('scripts')
    <script type="text/javascript">
        import ProfileCircle from './components/ProfileCircle.js';
        import HeroSection from './components/HeroSection.js';
        ReactDOM.render(<ProfileCircle />, document.getElementById('profile-circle'));
        ReactDOM.render(<HeroSection />, document.getElementById('hero-section'));
    </script>
@endpush --}}
