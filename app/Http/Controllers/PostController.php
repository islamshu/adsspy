<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Post::get());
        return view('dashboard.post.index')->with('posts',Post::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.post.create');
    }
    public function post_special_status(Request $request){
        $post = Post::find($request->post_id);
        $post->special = $request->special;
        $post->save();
        return true;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $cat = Post::get();
        $array = [];
        foreach($cat as $post){
            $posts = explode(',',$post->category);
            foreach($posts as $pot){
                array_push($array,$pot);
            }
        }
        $category = collect($array)->unique();
       
        return view('dashboard.post.edit')->with('post',$post)->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        
     

        $request_all = $request->except(['image','video','page_logo','category']);
        $request_all['category'] =  collect($request->category)->implode(',');
        // dd($request_all);
        $post->update($request_all);
        $requestt= [];
        if($request->image != null){
            $requestt['image'] = $request->image->store('post_image');
        }
        if($request->page_logo != null){
            $requestt['page_logo'] = $request->page_logo->store('post_image');
        }
        if($request->video != null){
            try{
            $cover = file_get_contents( $request->video );
            
            $name_cover = substr($cover, strrpos($cover, '/upload/') + 1);
              
            $video = '/'.rand(0,1000000000).'.mp4';
          
            Storage::put($video, $cover);
            $requestt['video'] = $video;
        }catch (\Exception $e) {
           dd($e);
        } 
        }
        $postr = $post->resorese();

      
        $postr->update($requestt);
        return redirect()->back()->with(['success'=>'edit']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with(['success'=>'Post deleted successfully']);
    }
}
