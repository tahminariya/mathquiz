<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Category;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        $categories = Category::all();
        return view('admin.questions', compact('questions', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'correct_option' => 'required',
            'category_id' => 'required'
        ]);

        Question::create($request->all());

        return redirect()->back()->with('success', 'Question added.');
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit_question', compact('question', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'correct_option' => 'required',
            'category_id' => 'required'
        ]);

        Question::findOrFail($id)->update($request->all());

        return redirect()->route('admin.questions')->with('success', 'Question updated.');
    }

    public function destroy($id)
    {
        Question::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Question deleted.');
    }
}
