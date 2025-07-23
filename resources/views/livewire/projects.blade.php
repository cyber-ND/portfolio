<div>
    @section('content')
        <div class="relative min-h-screen bg-black overflow-hidden">
            {{-- Particle container --}}
            <div id="tsparticles" class="absolute inset-0 -z-10"></div>

            <div class="relative max-w-6xl mx-auto px-4 sm:px-6 md:px-8 py-8">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-purple-400 text-center mb-8">My Projects</h2>

                @if ($projects->isEmpty())
                    <p class="text-gray-300 text-center text-lg">No projects available yet.</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                        @foreach ($projects as $project)
                            <div
                                class="p-4 bg-black/20 border border-purple-400 rounded-lg shadow-md transition-all duration-300 hover:shadow-lg hover:scale-[1.02]">
                                <h3 class="text-xl sm:text-2xl font-semibold text-white mb-2">{{ $project->title }}</h3>
                                <p class="text-gray-300 text-sm sm:text-base leading-relaxed mb-4">
                                    {{ Str::limit($project->description, 150) }}</p>
                                @if ($project->image)
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                        class="w-full h-48 sm:h-56 object-cover rounded-md mb-4">
                                @endif
                                @if ($project->link)
                                    <a href="{{ $project->link }}"
                                        class="inline-block px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white font-bold rounded-md transition-all duration-300">View
                                        Project</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @endsection
</div>

{{-- @push('scripts')
    <script type="text/javascript">
        import ProfileCircle from './components/ProfileCircle.js';
        import ProjectGallery from './components/ProjectGallery.js';
        ReactDOM.render(<ProfileCircle />, document.getElementById('profile-circle'));
        ReactDOM.render(<ProjectGallery />, document.getElementById('project-gallery'));
    </script>
@endpush --}}
