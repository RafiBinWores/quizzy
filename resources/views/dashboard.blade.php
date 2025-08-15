<x-app-layout>
    <div
        class="min-h-[calc(100vh-65px)] w-full bg-[url('https://pagedone.io/asset/uploads/1691055810.png')] bg-no-repeat bg-cover bg-center py-10 px-2">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <p class="text-lg text-gray-700">Hello,</p>
            <p class="mb-4 text-xl font-extrabold text-blue-700 drop-shadow">{{ auth()->user()->name }}</p>
            <h2 class="mb-8 text-2xl font-bold text-blue-600 md:text-3xl">
                What subject do you want to <span
                    class="text-transparent bg-gradient-to-r from-pink-400 to-blue-400 bg-clip-text">improve</span>
                today?
            </h2>
        </div>
        <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
            @if (session('success'))
            <div class="p-4 mb-4 text-sm font-normal text-red-500 border border-red-400 rounded-xl bg-red-50"
                role="alert">
                {{ session('success') }}
            </div>
        @endif
        </div>
        
        <div class="grid grid-cols-1 gap-6 px-4 mx-auto mt-6 max-w-7xl sm:px-6 lg:px-8 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($categories as $cat)
                <a href="{{ route('quiz.start', ['category_id' => $cat->id]) }}"
                    class="relative flex flex-col items-center justify-center p-8 transition-all duration-200 border-2 border-blue-100 shadow-lg cursor-pointer group bg-white/80 rounded-2xl hover:border-blue-500 hover:bg-gradient-to-br hover:from-blue-50 hover:to-pink-50 focus:outline-none">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-3 text-3xl rounded-full bg-gradient-to-br from-blue-100 via-blue-200 to-pink-100 drop-shadow">
                        <svg class="w-8 h-8 text-blue-500 transition group-hover:text-pink-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14.752 11.168l-4.197-2.374A1 1 0 009 9.618v4.764a1 1 0 001.555.832l4.197-2.373a1 1 0 000-1.664z" />
                        </svg>
                    </div>
                    <span
                        class="text-lg font-bold text-blue-700 transition group-hover:text-pink-500">{{ $cat->name }}</span>
                    <span class="mt-1 text-xs text-gray-500">Start Quiz</span>
                    <span
                        class="absolute top-3 right-3 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-600 opacity-80 group-hover:bg-pink-100 group-hover:text-pink-500 transition">
                        {{ $cat->questions()->count() }} Qs
                    </span>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
