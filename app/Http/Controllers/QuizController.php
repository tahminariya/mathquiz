<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use App\Models\Category;
use App\Models\Result;
 use App\Models\User;

class QuizController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('quizzes.index', compact('categories'));
    }


public function show(Request $request)
{
    $user_id = $request->input('user_id');
    $category_id = $request->input('category_id');

    // ✅ Block if user ID doesn't exist
    if (!$user_id || !User::find($user_id)) {
        return redirect('/')->with('error', 'Invalid User ID.');
    }

      $questions = Question::where('category_id', $category_id)
    ->orderBy('id', 'asc') 
    ->limit(10)
    ->get();


    return view('quizzes.show', compact('questions', 'user_id', 'category_id'));
}


    public function submit(Request $request)
    {
        $score = 0;

        foreach ($request->input('answers') as $qid => $answer) {
            $question = Question::find($qid);
            if ($question && $question->correct_option === $answer) {
                $score++;
            }
        }

        Result::create([
            'user_id' => $request->user_id,
            'score' => $score,
            'category_id' => $request->category_id
        ]);

        return view('quizzes.result', [
            'score' => $score,
            'user_id' => $request->user_id
        ]);
    }

    public function history(Request $request)
    {
        $user_id = $request->query('user_id', Auth::id());

        $results = Result::with('category')
            ->where('user_id', $user_id)
            ->orderBy('id', 'desc')
            ->get();

        return view('quizzes.history', compact('results', 'user_id'));
    }
}
