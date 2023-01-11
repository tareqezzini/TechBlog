<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Exception;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        // Middleware only applied to these methods
        $this->middleware('auth')->only([
            'update', 'create' , 'destroy', 'edit', 'store'
        ]);
    }
   
    public function index()
    {
        $from = 'all';
        $allBlogs = Post::where('Status' , 1)->get();
        return view('blog.index' , compact('allBlogs', 'from'));
    }
  
    public function create()
    {
        $cats = Category::all();
        return view('blog.create' , compact('cats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'post_text' => 'required',
            'img_post' => 'required|mimes:jpg,png,jpeg|max:10096',
            'cat' => 'required',
        ]);
        $slug = Str::of($request->title )->slug('-');
        $newImgName = uniqid() . "_" . $slug . "." . $request->img_post->extension();
        try{
            $request->img_post->move(public_path('images_post') , $newImgName);
            Post::create(
                [
                    'title' => $request->title,
                    'post' => $request->post_text,
                    'image_path' => $newImgName,
                    'user_id' => auth()->user()->id,
                    'cat_id' => $request->cat,
                    'slug' => $slug,
                ]
                );
        }catch (\Exception $e) {

            return $e->getMessage();
        }
       
        return redirect('/blog')->with("message" , "The Post Is Added");
    }

    public function show($slug)
    {
        $post = Post::where('slug' , $slug)->first();
        return view('blog.post' ,compact('post' , $post));
    }

  
    public function edit($slug)
    {
        $post = Post::where('slug' , $slug)->first();
        $cats = Category::all();
        return view('blog.edit' , compact('post' , 'cats'));
    }

    public function update(Request $request , $slug)
    {
        $validated = $request->validate([
            'title' => 'required',
            'post_text' => 'required',
            'img_post' => 'required|mimes:jpg,png,jpeg|max:4096',
            'cat' => 'required',
            ]);

            $newImgName = uniqid() . "_" . $slug . "." . $request->img_post->extension();

            $old_img = Post::select('image_path')->where('slug',$slug)->first()->image_path;
            if(Storage::disk('post_img')->exists($old_img))
                {
                    Storage::disk('post_img')->delete($old_img);
                }
            try{
                if(Storage::disk('post_img')->exists($old_img))
                {
                    Storage::disk('post_img')->delete($old_img); 
                }
            $request->img_post->move(public_path('images_post') , $newImgName);
            Post::where('slug' , $slug)->update(
                [
                    'title' => $request->title,
                    'post' => $request->post_text,
                    'image_path' => $newImgName,
                    'cat_id' => $request->cat,
                ]
            );
            
            return redirect('/blog')->with("message" , "The Post Is Added");
        }catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    public function destroy($slug)
    {
        try{
            $old_img = Post::select('image_path')->where('slug',$slug)->first()->image_path;
            if(Storage::disk('post_img')->exists($old_img))
                {
                    Storage::disk('post_img')->delete($old_img); 
                }
            Post::where('slug' , $slug)->delete();
            return redirect('/blog')->with('message', 'The Post is Deleted');
        }catch(Exception $e)
        {
            return $e->getMessage();
        }
    }
   
}