<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\tag;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TagController extends Controller
{
    public function index()
    {

        $tag = tag::all();
        return view('admin.tag.index', compact('tag'));

    }

    public function create()
    {
        return view('admin.tag.create');

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error','error name');
        }
        $tag = new tag;
        $tag->name = $request['name'];
        $tag->save();
        return redirect('admin/tag')->with('message', 'tag Added Successfully');

    }

    public function edit($tag_id,Request $request)
    {
        if(empty($tag_id))
            return redirect()->back()->with('error','error id');
        $tag = Tag::where('id',$tag_id)->first();
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(Request $request, $tag_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error','error name');
        }
        $tag = Tag::find($tag_id);
        $tag->name = $request['name'];
        $tag->update();
        return redirect('admin/tag')->with('message', 'tag updated Successfully');
    }

    public function destroy($tag_id)
    {
        $tag = tag::find($tag_id);
        if ($tag) {
            $tag->delete();
            return redirect('admin/tag')->with('message', 'tag Deleted Successfully');
        } else {
            return redirect('admin/category')->with('message', 'No Category Id Found');

        }

    }


}
