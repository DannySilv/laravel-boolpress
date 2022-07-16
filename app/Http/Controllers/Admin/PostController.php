<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $posts = Post::paginate(9);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->genValidationRules());
        $data = $request->all();

        if (isset($data['image'])) {
            $image_path = Storage::put('post_covers', $data['image']);
            $data['cover'] = $image_path;
        }

        $post = new Post();
        $post->fill($data);
        $post->slug = Post::genPostSlug($post->title);
        $post->save();

        if(isset($data['tags'])) {
            $post->tags()->sync($data['tags']);
        }

        return redirect()->route('admin.posts.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $category = $post->category;
        $tags = Tag::all();

        return view('admin.posts.show', compact('post', 'category', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->genValidationRules());
        $data = $request->all();
        $post = Post::findOrFail($id);

        if (isset($data['image'])) {
            if ($post->cover) {
                Storage::delete($post->cover);
            }
            $image_path = Storage::put('post_covers', $data['image']);
            $data['cover'] = $image_path;
        }

        // Fill + Save
        // $post->fill($data);
        // $post->slug = Post::genPostSlug($post->title);
        // $post->save();

        //Update
        $data['slug'] = Post::genPostSlug($data['title']);
        $post->update($data);

        if(isset($data['tags'])) {
            $post->tags()->sync($data['tags']);
        } else {
            $post->tags()->sync([]);
        }

        return redirect()->route('admin.posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->sync($id);
        if ($post->cover) {
            Storage::delete($post->cover);
        }
        $post->delete();
        return redirect()->route('posts.index');
    }

    private function genValidationRules() {
        return [
            'title' => 'required|max:255',
            'content' => 'required|max:30000',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'image|max:1024'
        ];
    }
}
