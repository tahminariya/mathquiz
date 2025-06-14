<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NAME' => 'required|string|max:100'
        ]);

        Category::create(['NAME' => $request->NAME]);

        return redirect()->back()->with('success', '✅ Category added successfully!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.edit_category', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NAME' => 'required|string|max:100'
        ]);

        Category::findOrFail($id)->update(['NAME' => $request->NAME]);

        return redirect()->route('admin.categories')->with('success', '✅ Category updated successfully!');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('success', '🗑️ Category deleted successfully!');
    }
}
