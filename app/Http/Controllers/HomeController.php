<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Article;
use App\Category;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    /**
     * Show the application blog page
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function blog(){
        $article = Article::where('user_id',Auth::user()->id)->get();
        return view('blog.blog',['articles'=>$article]);
    }

     /**
     * Show the application profile page
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile(){
        $user = User::find(Auth::user()->id);
        return view('profile.profile',['user'=>$user]);
    }

    public function welcome(){
        return view('welcome');
    }

    public function user(){
        $users = User::where('role', '<>', 'admin')->get();
        return view('admin.user', ['users'=>$users]);
    }
}
