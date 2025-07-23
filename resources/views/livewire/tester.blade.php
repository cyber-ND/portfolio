 <div>
        <div class="relative max-w-md mx-auto mt-16 px-4 sm:px-8 py-8 bg-gray-800 rounded-lg">
            <h2 class="text-2xl font-bold mb-6 text-white text-center">Contact Form</h2>

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

            <form wire:submit="submitForm">
                <div class="mb-4">
                    <label for="name" class="block text-white text-sm font-bold mb-2">Name</label>
                    <input id="name" type="text" wire:model.live="name"
                        class="w-full px-3 py-2 bg-transparent border border-gray-400 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 {{ $errors->has('name') ? 'border-red-500' : '' }}"
                        required>
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-white text-sm font-bold mb-2">Email</label>
                    <input id="email" type="email" wire:model.live="email"
                        class="w-full px-3 py-2 bg-transparent border border-gray-400 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 {{ $errors->has('email') ? 'border-red-500' : '' }}"
                        required>
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-md transition-all duration-300">
                        Submit
                    </button>
                </div>
            </form>

            <!-- Optional: Display real-time input values for debugging -->
            <div class="mt-4 text-white text-sm">
                <p>Current Name: {{ $name }}</p>
                <p>Current Email: {{ $email }}</p>
            </div>
        </div>
    </div>