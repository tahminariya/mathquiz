<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;
use App\Models\Result;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');
    }

    public function categories() {
        $categories = Category::all();  // ✅ Data fetch
        return view('admin.categories', compact('categories'));
    }

    public function questions() {
        $questions = Question::all();  // ✅ Data fetch
        return view('admin.questions', compact('questions'));
    }

    public function results() {
        $results = Result::with('category')->orderBy('id', 'desc')->get();  // ✅ Data fetch
        return view('admin.results', compact('results'));
    }
}
