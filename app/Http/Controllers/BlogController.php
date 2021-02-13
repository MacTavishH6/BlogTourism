<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Artisan;
use Validator;
use App\Article;
use App\Category;
use Auth;

class BlogController extends Controller
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
     *  Show the application create blog page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createblog(){
        $categories = Category::all();
        return view('blog.createblog',['categories'=>$categories]);
    }

    /**
     * Get a validator for an incoming blog creation.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator($request)
    {
        return Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required'],
            'photo' => ['required', 'image', 'max:10000'],
            'description' => ['required', 'min:25'],
        ]);
    }

    /**
     * Save blog creation.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveblog(Request $request){
        if (!$this->validator($request)) return redirect()->back()->withInput($request->all())->withErrors($this->validator($request)->errors());
        try{
            $imageName = $request->file('photo')->getClientOriginalName();
            Storage::disk('public')->putFileAs('img', $request->file('photo'), $imageName);
            Artisan::call('storage:link', [] );
    
            $article = new Article;
            $article->user_id = Auth::user()->id;
            $article->category_id = $request->category;
            $article->title = $request->title;
            $article->description = $request->description;
            $article->image = $imageName;
            $article->save();
            return redirect('/blog')->with('status',"Blog added successfully!");
        }
        catch(Exception $e){
            return redirect()->back()->with('failed',"Error occured when saving blog..");
        }
    }

    /**
     * Delete blog.
     *
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deleteblog($id){
        $article = Article::where('id',$id)->first();
        $article->delete();
        if(Auth::user()->role != 'admin')
        return redirect('/blog')->with('status',"Blog deleted successfully!");
        else
        return redirect('/home')->with('status',"Blog deleted successfully!");
    }
}
