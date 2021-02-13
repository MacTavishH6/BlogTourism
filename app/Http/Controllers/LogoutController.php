<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller
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
     * Make user logout.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/home');
    }

    /**
     *  Show the application profile page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile(){
        return view('blog.createblog');
    }
}
