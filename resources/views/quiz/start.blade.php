<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 py-8">
        <div class="mb-8 flex items-center justify-between">
            <h2 class="text-2xl font-extrabold tracking-tight">📝 Quiz Time!</h2>
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-medium shadow">Quiz in Progress</span>
        </div>

        <form id="quiz-form" method="POST" class="space-y-8">
            @csrf
            <input type="hidden" name="category_id" value="{{ $category->id }}">
            @foreach($questions as $i => $q)
                <div class="bg-white rounded-2xl shadow-lg p-6 @if($i == 0) border-2 border-blue-500 @endif transition">
                    <div class="flex items-center mb-3">
                        <span class="inline-block w-8 h-8 rounded-full bg-blue-500 text-white text-center leading-8 font-bold mr-3 shadow">{{ $i+1 }}</span>
                        <span class="font-semibold text-lg text-gray-800">{{ $q->question }}</span>
                    </div>
                    <div class="space-y-2 ml-11">
                        @foreach($q->options as $opt)
                            <label class="flex items-center gap-2 bg-gray-50 hover:bg-blue-50 rounded-lg px-3 py-2 cursor-pointer border border-gray-200 hover:border-blue-300 transition">
                                <input type="radio" name="answers[{{ $q->id }}]" value="{{ $opt }}" required class="accent-blue-600 w-5 h-5">
                                <span class="text-gray-700 font-medium">{{ $opt }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div class="flex justify-center mt-10">
                <button type="submit"
                        class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 transition text-white font-semibold rounded-xl px-8 py-3 shadow-lg text-lg tracking-wide">
                    ✅ Submit Answers
                </button>
            </div>
        </form>
    </div>

 @push('scripts')
 <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

 <script>
    // Make sure CSRF token is sent with AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#quiz-form').submit(function(e){
        e.preventDefault();
        let form = $(this);

        $.ajax({
            url: "{{ route('quiz.submit') }}",
            method: "POST",
            data: form.serialize(),
            success: function(res){
                window.location.href = '/quiz/' + res.quiz_id;
            },
            error: function(xhr){
                let msg = 'Submission failed! Please try again.';
                if(xhr.responseJSON && xhr.responseJSON.message) {
                    msg = xhr.responseJSON.message;
                }
                alert(msg);
            }
        });
    });
</script>

 @endpush
</x-app-layout>
