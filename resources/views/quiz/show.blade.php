<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 py-10">

        <div class="mb-8 flex flex-col items-center justify-center">
            <div class="flex items-center mb-2">
                <span class="inline-block p-2 bg-blue-100 rounded-full mr-2">
                    <svg class="w-7 h-7 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 21h8m-4-4v4m0-4a4 4 0 100-8 4 4 0 000 8z"/>
                    </svg>
                </span>
                <h2 class="text-3xl font-extrabold text-gray-800 tracking-tight">
                    Quiz Result <span class="text-blue-500">#{{ $quiz->id }}</span>
                </h2>
            </div>
            <div class="bg-white shadow-md rounded-xl p-6 flex flex-col items-center mt-4 w-full">
                <span class="text-5xl mb-2">
                    @if($quiz->answers->where('is_correct', true)->count() / $quiz->answers->count() >= 0.8)
                        🏆
                    @else
                        📊
                    @endif
                </span>
                <div class="text-lg font-semibold text-gray-700 mb-1">Your Score:</div>
                <div class="text-2xl font-extrabold text-blue-600 mb-2">
                    {{ $quiz->answers->where('is_correct', true)->count() }} / {{ $quiz->answers->count() }}
                </div>
                <a href="{{ route('quiz.results') }}"
                   class="inline-block mt-3 bg-blue-600 text-white px-6 py-2 rounded-xl shadow hover:bg-blue-700 font-semibold transition">
                    Back to My Results
                </a>
            </div>
        </div>

        <div class="space-y-8 mt-8">
            @foreach($quiz->answers as $i => $answer)
                <div class="rounded-2xl shadow-lg p-6 border-2 @if($answer->is_correct) border-green-400 bg-green-50 @else border-red-400 bg-red-50 @endif transition">
                    <div class="flex items-center mb-3">
                        <span class="inline-block w-8 h-8 rounded-full @if($answer->is_correct) bg-green-500 @else bg-red-500 @endif text-white text-center leading-8 font-bold mr-3 shadow">
                            {{ $i+1 }}
                        </span>
                        <span class="font-semibold text-lg text-gray-800">{{ $answer->question->question }}</span>
                    </div>
                    <div class="ml-11">
                        <span class="block text-base font-medium">
                            <span class="font-semibold">Your answer:</span>
                            <span class="@if($answer->is_correct) text-green-700 @else text-red-700 @endif">
                                {{ $answer->selected_option }}
                            </span>
                            @if(!$answer->is_correct)
                                <span class="ml-2 text-gray-700">(Correct: <span class="font-semibold text-green-600">{{ $answer->question->correct_option }}</span>)</span>
                            @endif
                        </span>
                        @if($answer->is_correct)
                            <span class="inline-flex items-center mt-2 px-3 py-1 rounded-full bg-green-200 text-green-900 text-xs font-bold">Correct</span>
                        @else
                            <span class="inline-flex items-center mt-2 px-3 py-1 rounded-full bg-red-200 text-red-900 text-xs font-bold">Wrong</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
