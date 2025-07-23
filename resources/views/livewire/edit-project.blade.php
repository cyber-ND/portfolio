<div>
    @section('content')
        <div class="relative max-w-md mx-auto mt-16 px-4 sm:px-8 py-8 bg-black/20 rounded-lg">
            <h2 class="text-2xl sm:text-3xl font-bold mb-6 text-white text-center">Edit Project</h2>
            <form wire:submit.prevent="updateProject">
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
                <div class="flex justify-center space-x-4">
                    <button type="submit"
                        class="px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white font-bold rounded-md transition-all duration-300">Update
                        Project</button>
                    <a href="{{ route('admin.dashboard') }}"
                        class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-bold rounded-md transition-all duration-300">Cancel</a>
                </div>
            </form>

            @if (session('success'))
                <div class="mt-4 p-4 bg-green-500/20 text-white rounded-md">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    @endsection
</div>
