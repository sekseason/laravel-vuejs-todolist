<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories|min:4'
        ]);
        
        Category::create([
            'name' => $request->input('name')
        ]);

        return redirect('/admin/category')->with('notify', ['type' => 'success', 'message' => 'Created successfully!']);
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories|min:4'
        ]);

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect('/admin/category')->with('notify', ['type' => 'success', 'message' => 'Updated successfully!']);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/admin/category')->with('notify', ['type' => 'success', 'message' => 'Deleted successfully!']);
    }
}
