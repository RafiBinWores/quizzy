<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class QuizController extends Controller
{
    // select category
    public function selectCategory()
    {
        $categories = Category::all();
        return view('dashboard', compact('categories'));
    }

    // start quiz
    public function start(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
        ]);
        $category_id = $request->category_id;
        $sessionKey = "quiz_questions_category_$category_id";

        // If questions are not in session, generate and redirect (so next request is always GET)
        if (!session()->has($sessionKey)) {
            $questions = Question::where('category_id', $category_id)
                ->inRandomOrder()->limit(20)->get();

            if ($questions->count() < 1) {
                return back()->with('success', 'Not enough questions in this category!');
            }

            session([$sessionKey => $questions->pluck('id')->toArray()]);
            // Redirect to same page so questions are now loaded from session (prevents form resubmission or double load)
            return redirect()->route('quiz.start', ['category_id' => $category_id]);
        }

        $questionIds = session($sessionKey);
        $questions = Question::whereIn('id', $questionIds)->get();
        $category = Category::find($category_id);

        return view('quiz.start', compact('questions', 'category'));
    }

    // submit quiz answers
    public function submit(Request $request)
    {
        try {
            $data = $request->validate([
                'answers' => 'required|array',
                'category_id' => 'required|exists:categories,id',
            ]);

            $quiz = Quiz::create(['user_id' => Auth::id()]);

            foreach ($data['answers'] as $question_id => $selected_option) {
                $question = Question::find($question_id);
                if (!$question) continue;
                $is_correct = $selected_option === $question->correct_option;
                $quiz->answers()->create([
                    'question_id' => $question->id,
                    'selected_option' => $selected_option,
                    'is_correct' => $is_correct,
                ]);
            }

            // REMOVE SESSION after submission
            $sessionKey = "quiz_questions_category_" . $request->category_id;
            session()->forget($sessionKey);

            return response()->json(['success' => true, 'quiz_id' => $quiz->id]);
        } catch (\Exception $e) {
            Log::error('Quiz submission error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting your quiz. Please try again.'
            ], 500);
        }
    }

    // show quiz results
    public function results()
    {
        $quizzes = Quiz::with('answers.question')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);
        return view('quiz.results', compact('quizzes'));
    }

    // show quiz result
    public function show(Quiz $quiz)
    {
        if ($quiz->user_id !== Auth::id()) {
            abort(403);
        }
        $quiz->load('answers.question');
        return view('quiz.show', compact('quiz'));
    }
}
