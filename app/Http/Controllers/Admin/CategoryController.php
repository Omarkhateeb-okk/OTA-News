<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }
    //    public function post_category(category_id)
    //    {
    //        $category =Category::all()
    //        return view('admin.category.index',compact('category'));
    //
    //    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'description' => 'nullable',
            'img' => 'nullable',
            'is_active' => 'nullable',
            'navbar' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error','error name');
        }
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->img = $filename;
        }
        $category->is_active = $request->is_active == true ? 0 : 1;
        $category->navbar = $request->navbar == true ? 0 : 1;
        // $category->user_id =Auth::user()->id;
        $category->save();
        return redirect('admin/category')->with(
            'message',
            'category Added Successfully'
        );
    }

    public function edit($category_id)
    {
        $category = Category::find($category_id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $category_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'description' => 'nullable',
            'img' => 'nullable',
            'is_active' => 'required',
            'navbar' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error','error name');
        }

        $category = Category::find($category_id);
        $category->name = $request->get('name');
        $category->description = $request->get('description');

        if ($request->hasFile('img')) {
            $destination = 'uploads/category/' . $category->img;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->img = $filename;
        }
        $category->navbar = $request->navbar == true ? 0 : 1;
        $category->is_active = $request->is_active == true ? 0 : 1;
        $category->update();
        return redirect('admin/category')->with(
            'message',
            'category updated Successfully'
        );
    }
    public function destroy($category_id)
    {
        $category = Category::find($category_id);
        if (!empty($category)) {
            $category->delete();
            return redirect('admin/category')->with(
                'message',
                'category Deleted Successfully'
            );
        } else {
            return redirect('admin/category')->with(
                'message',
                'No Category Id Found'
            );
        }
    }
}
