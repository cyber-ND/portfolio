<div>
    @section('content')
        <div class="relative max-w-md mx-auto mt-16 px-4 sm:px-8 py-8 bg-black/20 rounded-lg">
    <h2 class="text-2xl sm:text-3xl font-bold mb-6 text-white text-center">Secret Admin Login</h2>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-500/20 text-white rounded-md border border-green-500">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error') || $errors->any())
        <div class="mb-4 p-4 bg-red-500/20 text-white rounded-md border border-red-500">
            @if (session('error'))
                <p class="text-red-500 text-xs">{{ session('error') }}</p>
            @endif
            @foreach ($errors->all() as $error)
                <p class="text-red-500 text-xs">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form wire:submit.prevent="loginUser">
        <div class="mb-4">
            <label for="email" class="block text-white text-sm font-bold mb-2">Email</label>
            <input id="email" type="text" wire:model="email" class="w-full px-3 py-2 bg-transparent border border-purple-400 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-purple-500 {{ $errors->has('email') ? 'border-red-500' : '' }}" required>
        </div>
        <div class="mb-6">
            <label for="password" class="block text-white text-sm font-bold mb-2">Password</label>
            <input id="password" type="password" wire:model="password" class="w-full px-3 py-2 bg-transparent border border-purple-400 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-purple-500 {{ $errors->has('password') ? 'border-red-500' : '' }}" required>
        </div>
        <div class="flex justify-center">
            <button type="submit" class="px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white font-bold rounded-md transition-all duration-300">Login</button>
        </div>
    </form>
</div>
    @endsection
</div>