<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PendingPostController extends Controller
{
   
        // public function __construct()
        // {
        //     // Middleware only applied to these methods
        //     $this->middleware('auth')->only([
        //         'update', 'create' , 'destroy', 'edit', 'store',
        //     ]);
    
        //     $this->middleware('checkStatus')->only([
        //         'pendingPost'
        //     ]);
        // }
    
        public function index()
        {
            $allBlogs = Post::where('Status' , 0)->get();
            return view('blog.pendingPost.index' , compact('allBlogs'));
        }
    
      
        public function create()
        {
            //
        }
    
       
        public function store(Request $request)
        {
            //
        }
    
        public function show($id)
        {
            //
        }
    
        public function edit($id)
        {
            Post::where('id' , $id)->update(
                [
                    'Status' => 1
                ]
                );
                return redirect()->back();
            
        }
    
        public function update($id)
        {
        }
    
        public function destroy($id)
        {
            Post::where('id',$id)->delete();
            return redirect()->back();
        }
}