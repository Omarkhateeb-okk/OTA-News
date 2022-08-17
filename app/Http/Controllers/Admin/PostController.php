<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $posts = (new Post())->get();
        return view('admin.post.index', compact('posts'));
    }

    public function getPostByTag($tagId)
    {
        $posts = (new Post())
            ->whereHas('postTag', function ($query) use ($tagId) {
                $query->where('tag_id', $tagId);
            })
            ->get();
        return view('admin.post.index', compact('posts'));
    }
    public function create()
    {
        $tags = Tag::all();
        $category = Category::where('is_active', '0')->get();
        return view('admin.post.create', compact('category', 'tags'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'tags_ids' => 'string',
            'description' => 'nullable',
            'img' => 'nullable',
            'is_hidden' => 'nullable',
            'navbar' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with('error', 'error name');
        }

        $post = new Post();
        $post->category_id = $request->category_id;
        $post->name = $request->get('name');
        $post->description = $request->description;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/post/', $filename);
            $post->img = $filename;
        }
        $post->is_hidden = $request->is_hidden == true ? 0 : 1;
        $post->user_id = Auth::user()->id;
        $post->save();

        $this->insertPostTag($post->id, $request->get('tags_ids'));
        return redirect('admin/posts')->with(
            'message',
            'Post Added Successfully'
        );
    }

    public function insertPostTag($postId, $tagIds)
    {
        $postTag = [];
        foreach (explode(' ', $tagIds) as $t) {
            $temp['tag_id'] = (int) $t;
            $temp['post_id'] = $postId;
            $temp['created_at'] = Carbon::now();
            $temp['updated_at'] = Carbon::now();
            array_push($postTag, $temp);
        }
        PostTag::insert($postTag);
        return true;
    }

    public function edit($post_id)
    {   $tags = Tag::all();
        $category = Category::where('is_active', '0')->get();
        $post = Post::find($post_id);
        return view('admin.post.edit', compact('post', 'category','tags'));
    }

    public function update(Request $request, $post_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'nullable',
            'img' => 'nullable',

        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with('error', 'error name');
        }
        $post = Post::find($post_id);
        $post->category_id = $request['category_id'];
        $post->name = $request['name'];
        $post->description = $request['description'];
        if ($request->hasfile('img')) {
            $destination = 'uploads/post/' . $post->img;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/post/', $filename);
            $post->img = $filename;
        }
        $post->is_hidden = $request->is_hidden == true ? '1' : '0';
        $post->user_id = Auth::user()->id;
        $post->update();

        return redirect('admin/posts')->with(
            'message',
            'Post Updated Successfully'
        );
    }
    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        $post->delete();
        return redirect('admin/posts')->with(
            'message',
            'Post Deleted Successfully'
        );
    }
}
