<div>
    @section('content')
        <div class="flex-1 p-6">
            <h2 class="text-4xl text-purple-400 mb-4">My Projects</h2>
            <p class="text-gray-300 mb-6">Dive into a collection of my most ambitious projects, each a testament to my expertise in creating stunning, technology-driven designs. From interactive applications to conceptual art, these works reflect my commitment to pushing the limits of digital creativity in a cyberpunk-inspired world.</p>
            <div id="project-gallery" class="grid grid-cols-1 md:grid-cols-2 gap-4"></div> <!-- Placeholder for React ProjectGallery component -->
        </div>
    @endsection
</div>

@push('scripts')
    <script type="text/javascript">
        import ProfileCircle from './components/ProfileCircle.js';
        import ProjectGallery from './components/ProjectGallery.js';
        ReactDOM.render(<ProfileCircle />, document.getElementById('profile-circle'));
        ReactDOM.render(<ProjectGallery />, document.getElementById('project-gallery'));
    </script>
@endpush
