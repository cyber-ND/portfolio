<div>
    @section('content')
        <div class="relative max-w-4xl mx-auto mt-16 px-4 sm:px-8 py-8 bg-black/20 rounded-lg">
            <h2 class="text-2xl sm:text-3xl font-bold mb-6 text-white text-center">Secret Admin Dashboard</h2>

            <!-- Logout Button -->
            <div class="flex justify-end mb-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white font-bold rounded-md transition-all duration-300">Logout</button>
                </form>
            </div>

            <!-- Create Project Form -->
            <div class="mb-8">
                <h3 class="text-xl sm:text-2xl font-bold mb-4 text-white">Create Project</h3>
                <form wire:submit.prevent="createProject">
                    <div class="mb-4">
                        <label for="project_name" class="block text-white text-sm font-bold mb-2">Project Name</label>
                        <input id="project_name" type="text" wire:model="project_name"
                            class="w-full px-3 py-2 bg-transparent border border-purple-400 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-purple-500 {{ $errors->has('project_name') ? 'border-red-500' : '' }}"
                            required>
                        @error('project_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="project_description" class="block text-white text-sm font-bold mb-2">Project
                            Description</label>
                        <textarea id="project_description" wire:model="project_description"
                            class="w-full px-3 py-2 bg-transparent border border-purple-400 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-purple-500 {{ $errors->has('project_description') ? 'border-red-500' : '' }}"
                            rows="4" required></textarea>
                        @error('project_description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="background_image_url" class="block text-white text-sm font-bold mb-2">Background Image
                            URL</label>
                        <input id="background_image_url" type="text" wire:model="background_image_url"
                            class="w-full px-3 py-2 bg-transparent border border-purple-400 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-purple-500 {{ $errors->has('background_image_url') ? 'border-red-500' : '' }}"
                            required>
                        @error('background_image_url')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-center">
                        <button type="submit"
                            class="px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white font-bold rounded-md transition-all duration-300">Create
                            Project</button>
                    </div>
                </form>
            </div>

            <!-- View All Projects -->
            <div>
                <h3 class="text-xl sm:text-2xl font-bold mb-4 text-white">All Projects</h3>
                <div class="grid grid-cols-1 gap-6">
                    @foreach ($projects as $project)
                        <div
                            class="group p-4 bg-transparent rounded-md hover:bg-purple-900/20 transition-all duration-300 ease-out">
                            <img src="{{ $project->background_image_url }}" alt="{{ $project->project_name }}"
                                class="w-full h-48 object-cover rounded-md mb-4 group-hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] transition-all duration-300">
                            <h4 class="text-xl font-bold text-white">{{ $project->project_name }}</h4>
                            <p class="text-white text-base">{{ $project->project_description }}</p>
                            <div class="flex justify-end space-x-2 mt-4">
                                <a href="{{ route('admin.projects.edit', $project->id) }}"
                                    class="px-3 py-1 bg-purple-500 hover:bg-purple-600 text-white rounded-md transition-all duration-300">Edit</a>
                                <button wire:click="deleteProject({{ $project->id }})"
                                    wire:confirm="Are you sure you want to delete this project?"
                                    class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md transition-all duration-300">Delete</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            @if (session('success'))
                <div class="mt-4 p-4 bg-green-500/20 text-white rounded-md">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    @endsection
</div>
