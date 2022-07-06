<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;

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
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
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
        $post = new Post();
        $post->fill($data);
        $post->slug = $this->genPostSlug($post->title);
        $post->save();

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
        return view('admin.posts.show', compact('post'));
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
        return view('admin.posts.edit', compact('post'));
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
        $request->validate($this->genVailadtionRules());
        $data = $request->all();
        $post = Post::findOrFail($id);
        $post->fill($data);
        $post->slug = $this->genPostSlug($post->title);
        $post->save();

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
        $post->delete();
        return redirect()->route('posts.index');
    }

    private function genPostSlug($title) {
        $base_slug = Str::slug($title, '-');
        $slug = $base_slug;
        $count = 1;
        $post_found = Post::where('slug', '=', $slug)->first();
        while ($post_found) {
            $slug = $base_slug . '-' . $count;
            $post_found = Post::where('slug', '=', $slug)->first();
            $count++;
        }
        return $slug;
    }

    private function genValidationRules() {
        return [
            'title' => 'required|max:255',
            'content' => 'required|max:30000'
        ];
    }
}
