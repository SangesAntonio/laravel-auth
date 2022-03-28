<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;

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
        $request->validate([
            'title' => 'required|max:100|min:2',
            'content' => 'required',
            'image' => 'unique:posts'

        ], [
            'required' => 'Il campo :attribute è obbligatorio',
            'content.min' => 'La lunghezza minima è :min',
            'unique' => "L \'immagine $request->image è già presente!"
        ]);
        $data = $request->all();
        $request->slug = Str::slug($request->title, '-');

        $post = new Post();
        $post->fill($data);
        $post->save();
        return redirect()->route('admin.posts.index', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $posts, $id)
    {
        $post = Post::find($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:100|min:2',
            'content' => 'required',
            'image' => 'unique:posts'

        ], [
            'required' => 'Il campo :attribute è obbligatorio',
            'content.min' => 'La lunghezza minima è :min',
            'unique' => "L \'immagine $request->image è già presente!"
        ]);
        $request->slug = Str::slug($request->title, '-');
        $data = $request->all();

        $post->update($data);

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {


        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
