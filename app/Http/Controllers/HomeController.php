<?php

namespace App\Http\Controllers;

use App\Post;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL ;
use Storage;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function test_form(Request $request){
        dd($request);
    }
    public function index(Request $request)
    {
        $posts = Post::with('resorese');
      
    


        if ($request->ajax() && $request->is_filtter == null ) {
           
        

            
    		$view = view('data',compact('posts'))->render();
            return response()->json(['html'=>$view]);

        }elseif($request->ajax() && $request->is_filtter == 1 ){
            if($request->has('post_type') && $request->post_type != 'all'){
                $posts->where('ad_format','like','%'.$request->post_type.'%');
            }
            if($request->has('country') && $request->country != 'country'){
                $posts->where('country','like','%'.$request->country.'%');
            }
            if($request->has('obj') && $request->obj !='objective/ cta'){
                $posts->where('button','like','%'.$request->obj.'%');

            }
            if($request->has('lang')){
                $posts->where('t_lang','like','%'.$request->lang.'%');
            }
            if($request->has('enng') && $request->enng != 'undefined undefined' ){
                $partitaion = explode(" ", $request->enng);
                if($partitaion[1] == '>1000'){
                    $str = substr($partitaion[1], 1);
                    $posts->where($partitaion[0],'>',$str);
                }else{
                    $part2 = explode("~", $partitaion[1]);
                    $posts->whereBetween($partitaion[0], [$part2[0], $part2[1]]);
                }
    
            }
            if($request->has('sort_by')){
                $posts->orderBy($request->sort_by, 'desc');
            }
        
            return view('data')->with('posts',$posts->get());

        }
        $posts = $posts->paginate(6);

                 return view('front.posts')->with('posts',$posts);

    }
    public function downaload($post_id){
        $post = Post::with('resorese')->find($post_id);
        
 
       $foramt= $post->ad_format;
       if($foramt == 'image'){
        $test=   public_path('uploads/'.$post->resorese->first()->image);

    return Response::download($test);
   

    }else{
        $test=   public_path('uploads/'.$post->resorese->first()->video);
        return Response::download($test);
       }
    }
    public function fillter_serach(Request $request,$page =null){
        $posts = Post::with('resorese');

        if($request->has('post_type') && $request->post_type != 'all'){
            $posts->where('ad_format','image');
        }
        
         $posts = $posts->paginate(6);
        //  dd($posts);
         
        if ($request->page == -2 && $request->ajax() ) {
          
    		$view = view('data',compact('posts'))->render();
            return response()->json(['html'=>$view]);

        }


            session()->put('test','test');
        return view('data')->with('posts',$posts);
    }
    
}
