<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with(['articles' => function($q){
            $q->where('articles.active', '=', 1);
        }])->get();
        
        return view('home')->with(compact('categories'));
    }

    public function category($category)
    {
        $category = Category::with(['articles'=> function($q){
            $q->where('articles.active', '=', 1);
        }])->where('id', $this->getCategoryID($category))->first();

        return view('category')->with(compact('category'));
    }

    public function local()
    {
        return $this->category('local');
    }

    public function global()
    {
        return $this->category('global');
    }

    protected function getCategoryID($categoryName)
    {
        $category = Category::where('name', $categoryName)->first();
        return $category->id;
    }
}
