<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 py-10">
        <div class="flex items-center justify-between mb-6">
            <h2 class=" text-xl md:text-2xl font-extrabold tracking-tight">🗂️ Quiz Records</h2>
        </div>

        @if($quizzes->isEmpty())
            <div class="bg-white shadow rounded-xl p-8 flex flex-col items-center">
                <img src="https://cdn-icons-png.flaticon.com/512/471/471664.png" class="w-24 h-24 mb-4 opacity-60" alt="No Results">
                <p class="text-lg text-gray-600 mb-2 font-semibold">No quiz attempts yet.</p>
                <a href="{{ route('dashboard') }}"
                   class="mt-3 bg-blue-600 text-white px-6 py-2 rounded-xl shadow hover:bg-blue-700 font-semibold transition">
                    Take your first quiz!
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full rounded-xl overflow-hidden shadow bg-white">
                    <thead>
                        <tr class="bg-blue-100 text-blue-900 text-left text-base font-semibold">
                            <th class="px-4 py-3">Quiz #</th>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Score</th>
                            <th class="px-4 py-3">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quizzes as $quiz)
                            <tr class="hover:bg-blue-50 transition">
                                <td class="p-4 font-bold text-blue-600">#{{ $quiz->id }}</td>
                                <td class="p-4">{{ $quiz->created_at->format('d M Y, H:i') }}</td>
                                <td class="p-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full
                                        @if($quiz->answers->where('is_correct', true)->count() / max($quiz->answers->count(),1) >= 0.8)
                                            bg-green-100 text-green-800
                                        @elseif($quiz->answers->where('is_correct', true)->count() / max($quiz->answers->count(),1) >= 0.5)
                                            bg-yellow-100 text-yellow-800
                                        @else
                                            bg-red-100 text-red-800
                                        @endif
                                    ">
                                        {{ $quiz->answers->where('is_correct', true)->count() }}/{{ $quiz->answers->count() }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    <a href="{{ route('quiz.show', $quiz) }}"
                                       class="inline-flex items-center px-4 py-2 rounded-xl bg-blue-500 text-white hover:bg-blue-700 transition font-semibold shadow">
                                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m6 0l-3 3m3-3l-3-3" />
                                        </svg>
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4 mb-10">
                    {{ $quizzes->links() }}
                </div>
            </div>
            <a href="{{ route('dashboard') }}" class="w-full md:w-auto block text-center bg-blue-600 hover:bg-blue-700 transition text-white font-semibold rounded-xl px-8 py-3 shadow-lg text-lg">
                Take Another Quiz
            </a>
        @endif
    </div>
</x-app-layout>
