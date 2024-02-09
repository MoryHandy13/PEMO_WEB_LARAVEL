<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    public function index() {
       
        return view('index', [
            "Posts" => Post::latest()->paginate(6),
            "images" => [
                "/startbootstrap/assets/img/portfolio/cabin.png",
                "/startbootstrap/assets/img/portfolio/cake.png",
                "/startbootstrap/assets/img/portfolio/circus.png",
                "/startbootstrap/assets/img/portfolio/game.png",
                "/startbootstrap/assets/img/portfolio/safe.png",
                "/startbootstrap/assets/img/portfolio/submarine.png",
            ]
        ]);
    }

    public function posts() {
        $title = 'Semua Post';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')) {
            $author = User::firstWhere('name', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('posts', [
            "title" => $title,
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
            "images" => [
                "/startbootstrap/assets/img/portfolio/cabin.png",
                "/startbootstrap/assets/img/portfolio/cake.png",
                "/startbootstrap/assets/img/portfolio/circus.png",
                "/startbootstrap/assets/img/portfolio/game.png",
                "/startbootstrap/assets/img/portfolio/safe.png",
                "/startbootstrap/assets/img/portfolio/submarine.png",
            ]
        ]);
    }

    public function show(Post $post)
    {
        return view('show', [
            "title" => "Single Post",
            "active" => 'posts',
            "post" => $post
        ]);
    }

    function category() {
        return view('categories', [
            'title' => 'Post Categories',
            'active' => 'categories',
            'categories' => Category::all()
        ]);
    }
}
