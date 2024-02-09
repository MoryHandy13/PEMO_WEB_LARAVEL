<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function category() {
        return view('categories', [
            'title' => 'Post Categories',
            'active' => 'categories',
            'categories' => Category::all(),
            'images' => [
                '/startbootstrap/assets/img/portfolio/cabin.png',
                '/startbootstrap/assets/img/portfolio/cake.png',
                '/startbootstrap/assets/img/portfolio/circus.png',
                '/startbootstrap/assets/img/portfolio/game.png',
                '/startbootstrap/assets/img/portfolio/safe.png',
                '/startbootstrap/assets/img/portfolio/submarine.png',
            ]
        ]);
    }
}
