<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('index');
    }
   public function showPost($id)
   {
    $from = Category::where('id' , $id)->get();
    $allBlogs = Post::where('cat_id' , $id)->where('Status' , 1)->get();
    return view('blog.index' , compact('allBlogs' , 'from'));
   }
}