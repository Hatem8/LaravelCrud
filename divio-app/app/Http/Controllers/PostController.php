<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index',compact('posts'));
    }

    public function home(){
        $posts = Post::paginate(10);
        return view('home',compact('posts'));

    }
    public function search(Request $request)
    {
      
        $q = $request->search;
        $posts = Post::where('description','LIKE','%'.$q.'%')->get();
        return view('posts.search',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users= User::all();
        return view('posts.add',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string|min:3',
            'description'=>'required|string|max:1500',
            'user_id'=>'required|exists:users,id'
        ]);
       Post::create($data);
       return back()->with('success','Post Added Successfully');
     
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view ('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $newPost = $request->validate([
            'title'=>'required|string|min:3',
            'description'=>'required|string|max:1500',
            'user_id'=>'required|exists:users,id'
        ]);
        $post = Post::findOrFail($id);
        $post ->update($newPost);
        return redirect()->route('posts.index')->with('success','Post Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return back()->with('success','Post Deleted Successfully');
    }
}
