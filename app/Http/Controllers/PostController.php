<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request){
        $search=$request->search;
        $posts = Post::when($search,function($query,$search){
            $query->where('title','LIKE',"%{$search}%"); 
        })->latest()->paginate(6);

        if($request->ajax()){
            return view('blogs.posts',compact('posts'))->render();
        }
        
        $count = Post::count();
        return view('blogs.index',compact('posts','count'));
    }

    public function show(Post $post){
        return view('blogs.show',compact('post'));
    }

    public function dashboard(){
        $posts = Post::latest()->paginate(10);
        $count = Post::count();
        return view('admin.dashboard',compact('posts','count'));
    }

    public function create(){
        return view('admin.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'image'=>'required|image'
        ]);
        $image = $request->file('image')->store('blogs','public');

        Post::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'content'=>$request->content,
            'image'=>$image,
            'user_id' => auth()->id()
        ]);
        return redirect()->route('dashboard')->with('success','blog published successfully');

    }

    public function edit(Post $post){
        return view('admin.edit',compact('post'));
    }

    public function update(Request $request,Post $post){
        $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);
        if($request->hasFile('image')){
            Storage::disk('public')->delete($post->image);

            $image = $request->file('image')->store('blogs','public');
        }
        else{
            $image = $post->image;
        }

        $post->update([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'content'=>$request->content,
            'image'=>$image
        ]);
        return redirect()->route('dashboard')->with('sucess', 'blog updated successfully');
    }

    public function destroy(Post $post){
        Storage::disk('public')->delete($post->image);
        $post->delete();
        return back()->with('success','blog deleted');
    }

}
