<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-black">
    <div class="relative min-h-screen bg-black overflow-hidden">
        <canvas id="letter-glitch-bg" class="absolute inset-0 w-full h-full"></canvas>
        <div class="relative max-w-md mx-auto mt-16 px-4 sm:px-8 py-8 bg-black/20 rounded-lg">
            <h2 class="text-2xl sm:text-3xl font-bold mb-6 text-white text-center">Edit Project</h2>
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-500/20 text-white rounded-md border border-green-500">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-500/20 text-white rounded-md border border-red-500">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xs">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            @if ($project->image)
                <div class="mb-4">
                    <label class="block text-white text-sm font-bold mb-2">Current Image</label>
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover rounded-md">
                </div>
            @endif
            <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-white text-sm font-bold mb-2">Title</label>
                    <input id="title" type="text" name="title" value="{{ old('title', $project->title) }}" class="w-full px-3 py-2 bg-transparent border border-purple-400 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-purple-500 {{ $errors->has('title') ? 'border-red-500' : '' }}" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-white text-sm font-bold mb-2">Description</label>
                    <textarea id="description" name="description" class="w-full px-3 py-2 bg-transparent border border-purple-400 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-purple-500 {{ $errors->has('description') ? 'border-red-500' : '' }}" required>{{ old('description', $project->description) }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-white text-sm font-bold mb-2">New Image</label>
                    <input id="image" type="file" name="image" accept="image/*" class="w-full px-3 py-2 bg-transparent border border-purple-400 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-purple-500 {{ $errors->has('image') ? 'border-red-500' : '' }}">
                </div>
                <div class="mb-6">
                    <label for="link" class="block text-white text-sm font-bold mb-2">Project Link</label>
                    <input id="link" type="url" name="link" value="{{ old('link', $project->link) }}" class="w-full px-3 py-2 bg-transparent border border-purple-400 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-purple-500 {{ $errors->has('link') ? 'border-red-500' : '' }}">
                </div>
                <div class="flex justify-center gap-4">
                    <button type="submit" class="px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white font-bold rounded-md transition-all duration-300">Update</button>
                    <a href="{{ route('admin.cyber-dashboard') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-bold rounded-md transition-all duration-300">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    @livewireScripts
    @vite('resources/js/glitch.js')
</body>
</html>
