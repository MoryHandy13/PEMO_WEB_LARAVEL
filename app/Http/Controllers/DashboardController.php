<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard', [
            "Posts" => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create", [
            "categories" => Category::all(),    
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = str::limit(strip_tags($request->body), 100);

        Post::create($validatedData);

        return redirect("/dashboard/posts")->with("success", "New Post Has Been Added");
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if (auth()->user()->id == $post->user_id) {
            return view("show", [
                "post" => $post,
            ]);
        }
        else {
            return redirect("/dashboard/posts");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if (auth()->user()->id == $post->user_id) {
            return view("edit",[
                'post' => $post,
                'categories' => Category::all()
            ]);
        }
        else {
            return redirect("/dashboard/posts");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if ($request->slug != $post->slug) {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'slug' => 'required|unique:posts',
                'category_id' => 'required',
                'body' => 'required' 
            ]);
        } else {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'slug' => 'required',
                'category_id' => 'required',
                'body' => 'required' 
            ]);
        }
        

        $post->update($validatedData);

        return redirect("/dashboard/posts")->with("success", "Post Has Been Update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (auth()->user()->id == $post->user_id) {
            $post->delete();
        }
        else {
            return redirect("/dashboard/posts");
        }
        

        return redirect("/dashboard/posts")->with("success", "Post Has Been Deleted");
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(["slug"=>$slug]);
    }

}
