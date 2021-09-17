<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL ;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
class Post extends Model
{
    use HybridRelations;
    protected $guarded=[];
    /**
     * Get all of the comments for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resorese()
    {
        return $this->hasMany(Resoure::class, 'post_id');
    }
    public function data_post(){
        $image =  URL::to('/').'/uploads/'.$this->resorese->first()->image;

        if($this->ad_format == 'image'){
            $post = '  <div class="img-view">
            <img class="post-img" src="'.$image.'" alt="">
        </div>';
        return $post;
        }elseif($this->ad_format == 'video'){

            $vidoo =  URL::to('/').'/uploads/'.$this->resorese->first()->video;
$post = ' <div class="video">
<video muted="muted" controls loop   poster="'.$image.'" >
    <source
        src=" '.$vidoo.'"
        type="video/mp4">
    <source src="movie.ogg" type="video/ogg">
    Your browser does not support the video tag.
</video>
<i class="fal fa-play-circle fa-4x"></i>
<div class="overlay"></div>
</div>';
return $post;
        }

       
    }
    public function dec(){
        return Str::limit($this->Ad_Description, 90);
    }
    public function array_like_post(){
        $array = [];
        $postlike = $this->like;

       $test =array_push($array,$postlike);
      
       
        
        $related = Postrelated::where('post_id',$this->post_id)->get();
        if($related){
            foreach($related as $re){
                array_push($array,$re->like);
            }
            return $array;
        }else{
       return 'ttt';
        }


    }
    public function array_like_share(){
        $array = [];
        $postlike = $this->share;

       $test =array_push($array,$postlike);
      
       
        
        $related = Postrelated::where('post_id',$this->post_id)->get();
        if($related){
            foreach($related as $re){
                array_push($array,$re->share);
            }
            return $array;
        }else{
       return 'ttt';
        }


    }
    public function array_like_comment(){
        $array = [];
        $postlike = $this->comment;

       $test =array_push($array,$postlike);
      
       
        
        $related = Postrelated::where('post_id',$this->post_id)->get();
        if($related){
            foreach($related as $re){
                array_push($array,$re->comment);
            }
            return $array;
        }else{
       return 'ttt';
        }


    }
    public function dates(){
        $result = CarbonPeriod::create($this->post_create, '1 month', $this->last_seen);
        $array =[];
        foreach ($result as $dt) {
           $post = "'".$this->post_create ."'";
           $test = "'".$this->last_seen ."'";
        //    dd($test);
        array_push($array,$post);
           array_push($array,$test);


        }
      $array=  str_replace('"', '', json_encode($array));
    // dd($array);
      return $array;


    }
    public function count_date(){
        $difference = Carbon::parse($this->post_create)->diff(Carbon::parse($this->last_seen));


        // $interval = $this->post_create->diff($this->last_seen);
        return json_encode($difference->days) . ' '. 'days';
    }
    public function like_k(){
        $count = $this->like;
        
        if ($count >= 1000) {
            return round($count/1000, 1) . "k";
        } else {
            return $count;
        }
    }
    public function share_k(){
        $count = $this->share;
        
        if ($count >= 1000) {
            return round($count/1000, 1) . "k";
        } else {
            return $count;
        }
    }
    public function comment_k(){
        $count = $this->comment;
        
        if ($count >= 1000) {
            return round($count/1000, 1) . "k";
        } else {
            return $count;
        }
    }
    public function page_link_test(){
        $link1 =  Str::replaceFirst('https://','',$this->landanig_page);
        $link = Str::before($link1, '.com');
        return Str::limit( $link.'.com', 14);   
    }
    public function page_link_first(){
        // $link1 =  Str::replaceFirst('https://','',$this->landanig_page);
        $link = Str::before($this->landanig_page, '.com');
        return $link.'.com';
        // return Str::limit( $link.'.com', 14);   
    }
}