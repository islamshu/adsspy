<?php

namespace App\Http\Controllers;

use App\About;
use App\Blog;
use App\Conteactsection;
use App\First;
use App\Post;
use App\Postrelated;
use App\Price;
use App\Product;
use App\Resoure;
use App\Video;
use Carbon\Carbon;
use DateTime;
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
    public function frontend(){
        $firstsection = First::first();
        $vedeosection = Video::first();
        $about = About::first();
        $contact = Conteactsection::first();

        $products = Product::where('status','yes')->get();
        $prices = Price::where('status','yes')->get();
        return view('frontend.index',compact('firstsection','vedeosection', 'about','products','prices','contact'));
    }
    public function blog($slug){
        $blog = Blog::where('slug',$slug)->first();
        $related = Blog::where('status','yes')->where('id','!=',$blog->id) ->get() ->random(2);
        return view('frontend.blog')->with('blog',$blog)->with('relateds',$related );

    }
    public function blogs(){
        return view('frontend.blogs')->with('blogs',Blog::where('status','yes')->paginate(6));

    }
    public function index(Request $request)
    {
        
        // $posts = Post::truncate();
        // $res = Resoure::truncate();
        // $posttt = Postrelated::truncate();
        // dd('ff');
       

        // dd(Post::where('category','like','%'.'learning'.'%')->count());
        $query = Post::query()->with(['resorese','related']);   
        // dd($query->get());
        if($request->ajax()){
            
            $page = (int)$request->page;
            $offset = (int)$request->offset ;
            
            
            $query->when($request->post_type, function ($q) use ($request) {
                if($request->post_type != 'all'){
                return $q->where('ad_format', $request->post_type);
            }
            });
            $query->when($request->obj, function ($q) use ($request) {
                if($request->obj != 'objective/ cta'){
               
                return $q->where('button','like', '%'.strtolower($request->obj).'%');
            }
            });
            $query->when($request->category, function ($q) use ($request) {
                if($request->category != 'Category'){
                return $q->where('category','like', '%'.$request->category.'%');
            }
            });
            $query->when($request->country, function ($q) use ($request) {
                if($request->country != 'country'){
                return $q->where('country','like','%'. $request->country.'%');
            }
            });
            $query->when($request->country, function ($q) use ($request) {
                if($request->country != 'country'){
                return $q->where('country','like','%'. $request->country.'%');
            }
            });
            $query->when($request->lang, function ($q) use ($request) {
                return $q->where('lang','like','%'. $request->lang.'%');
            });
            $query->when($request->enng, function ($q) use ($request) {
               if($request->enng != 'undefined undefined'){
                //    dd($request->enng);
                   $longstring =  explode(" ", $request->enng);
                   $firstsection = $longstring[0];
                   $secandsection = $longstring[1];
                
                   $secand=explode("~", $secandsection);
                   $min = (int)$secand[0];
                   $max = (int)$secand[1];
                //    dd($min,$max);
                //    dd($q->whereBetween($firstsection,[$min,$max])->get());
                   return $q->whereBetween($firstsection,[$min,$max]);

               }
            });
            $query->when($request->min_max, function ($q) use ($request) {
                if($request->min_max != 'undefined undefined~undefined'){
                    //    dd($request->enng);
                       $longstring =  explode(" ", $request->min_max);
                       $firstsection = $longstring[0];
                       $secandsection = $longstring[1];
                    
                       $secand=explode("~", $secandsection);
                       $min = (int)$secand[0];
                       $max = (int)$secand[1];
                    //    dd($q->whereBetween($firstsection,[$min,$max])->get());
                       return $q->whereBetween($firstsection,[$min,$max]);
    
                   }
              
             });
            $query->when($request->radioValue, function ($q) use ($request) {
                if($request->radioValue != 'all'){
                    $data_old = Carbon::now()->subDays($request->radioValue)->format('Y-m-d');
                  
                    $date_new = Carbon::now()->format('Y-m-d');
                    return $q->whereBetween('post_create',[$data_old,$date_new]);

                }        
               });
               $query->when($request->post_type, function ($q) use ($request) {
               
                if($request->post_type != 'all'){
                   
                    
                    return $q->where('ad_format', $request->post_type);
                }         
               });
            $query->when($request->sort_by, function ($q) use ($request) {
               
                if($request->sort_by != 'last_seen'){
                   
                    
                    return $q->orderBy($request->sort_by, 'desc');
                }         
               });
            //    ->take($page)->skip($offset*$page)->get();
            $posts = $query->take($page)->skip($offset*$page)->get();
            $count = $query->take($page)->skip($offset*$page)->count();

            $view = view('data',compact(['posts']))->render();
            return response()->json(['html'=>$view,'count'=>$count]); 
        }else{
           
            $posts = Post::with('resorese')->paginate(3);
        }
      return view('front.posts',compact(['posts']));

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
