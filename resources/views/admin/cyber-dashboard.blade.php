<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-black">
    <div class="relative min-h-screen bg-black overflow-hidden">
        <canvas id="letter-glitch-bg" class="absolute inset-0 w-full h-full"></canvas>
        <div class="relative max-w-4xl mx-auto mt-16 px-4 sm:px-8 py-8 bg-black/20 rounded-lg">
            <h2 class="text-2xl sm:text-3xl font-bold mb-6 text-white text-center">Cyber Dashboard</h2>
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
            <div class="mb-6 flex gap-4">
                <a href="{{ route('admin.projects.create') }}" class="px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white font-bold rounded-md transition-all duration-300">Create New Project</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-bold rounded-md transition-all duration-300">Logout</button>
                </form>
            </div>
            <h3 class="text-xl font-bold mb-4 text-white">Projects</h3>
            <div class="grid gap-4">
                @foreach ($projects as $project)
                    <div class="p-4 bg-black/30 border border-purple-400 rounded-md">
                        <h4 class="text-lg font-bold text-white">{{ $project->title }}</h4>
                        <p class="text-white">{{ $project->description }}</p>
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="mt-2 w-full h-48 object-cover rounded-md">
                        @endif
                        @if ($project->link)
                            <a href="{{ $project->link }}" class="text-purple-400 hover:text-purple-600">View Project</a>
                        @endif
                        <div class="mt-2 flex gap-2">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="px-3 py-1 bg-purple-500 hover:bg-purple-600 text-white rounded-md">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @livewireScripts
    {{-- @vite('resources/js/glitch.js') --}}
</body>
</html>
