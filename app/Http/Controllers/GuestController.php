<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Category;

class GuestController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $article = Article::all();
        return view('home',['articles'=>$article]);
    }

    public function category($id)
    {
        $article = Article::where('category_id',$id)->get();
        $category = Category::where('id', $id)->first();
        return view('home',['articles'=>$article, 'category'=>$category]);
    }

    public function detailblog($id){
        $article = Article::where('id',$id)->first();
        return view('blog.detailblog', ['article'=>$article]);
    }

    public function about(){
        return view('about');
    }
}
