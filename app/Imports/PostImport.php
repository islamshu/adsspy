<?php
namespace App\Imports;
use App\Post;
use App\Postrelated;
use App\Resoure;
use Carbon\Carbon;
use Illuminate\Support\Collection; 
use Storage;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;
use DB;

class PostImport implements ToCollection { 
      public function collection(Collection $rows) { 
          dd($rows);
    // $posts = DB::table('resoures')->truncate();
    
    // // $posts = Postrelated::get();
       foreach($rows as $key=> $row){
 
        if($key == 0){
               continue;     
           }
            
             if($row[0] == null || $row[1] == null ){
            continue;     
        }
        
        
      if($row[7] != null){
          $row[7] = str_replace('/21','-2021',$row[7]);
          $row[7] = str_replace('/','-',$row[7]);
      }
      if($row[8] != null){
        $row[8] = str_replace('/21','-2021',$row[8]);
        $row[8] = str_replace('/','-',$row[8]);
    }
          
           $newpost = Post::where('post_id',$row[1])->orderBy( 'desc')->first();

           if($newpost){
               if($newpost->like ==$row[20] && $newpost->comment == $row[19] &&  $newpost->share=$row[18]){
                continue;
  
               }else{
                   

               $related = new  Postrelated();
               $related->post_id=$row[1];
               $related->share=(int)$row[18];
               $related->comment=(int)$row[19];
               $related->like=(int)$row[20];
               $related->last_seen=$row[8];
               $newpost->last_seen=$row[8];
               
               
               $related->save();
               $newpost->save();
               continue;
               }
           }
        
        
        
        
        
        
        
        if($row[4]){
            try{
 
        
                $cover = file_get_contents( $row[4] );
            
                $name_cover = substr($cover, strrpos($cover, '/') + 1);
              
            $video = '/'.rand(0,1000000000).'.mp4';
          
            Storage::put($video, $cover);

            }catch (\Exception $e) {
                $video = null;
            } 
        }
     
  
        if($row[5]){
        
            try{
 
        
                $cover = file_get_contents( $row[5] );
            
                $name_cover = substr($cover, strrpos($cover, '/upload/') + 1);
                // dd($name_cover);
              
            $image = '/uploads/'.rand(0,1000000000).'.jpg';
          
            Storage::put($image, $cover);

            }catch (\Exception $e) {
             continue;
            } 
        }
      
        if($row[22]){
            try{
 
        
                $cover = file_get_contents( $row[22] );
            
                $name_cover = substr($cover, strrpos($cover, '/upload/cover/') + 1);
              
            $fb_page_logo = rand(0,1000000000).'.jpg';
            
            Storage::put($fb_page_logo, $cover);
            
            }catch (\Exception $e) {
             continue;
            }    
        }


        $post = new Post();
      
        $post->page_id=$row[0];
        $post->post_id =$row[1];
        $post->ad_format    = $row[2]; 
        $post->landanig_page =$row[3];
        $post->post_link=$row[6];
       
        
             $post->post_create=$row[7]  ?? '2020-10-10';
             $test1=  Str::afterLast($row[8], '/');
            $link2 =  Str::replaceFirst($test1,'20'.$test1,$row[8]);
            $row8 = str_replace( '/', '-', $link2);
        $post->last_seen=$row[8];
        $post->interested=$row[9];
        $post->gender=$row[10];
        $post->age=$row[11];
        $post->country=$row[12];
        $post->lang=$row[15];
        $post->country_see_in = $row[13];
        $post->t_lang = $row[14];
        $post->page_link=$row[16];
        $post->button=$row[17];
        if($row[18] != null){
            $post->share = (int)$row[18];

        }else{
            $post->share=0;

        }
        if($row[19] != null){
            $post->comment = (int)$row[19];

        }else{
            $post->comment=0;

        }
        if($row[20] != null){
            $post->like = (int)$row[20];

        }else{
            $post->like=0;

        }
      
        $post->page_name=$row[21];
        $post->Ad_Description=$row[23];
        $post->title=$row[24];
        $post->category=$row[27];
        $post->keywords=$row[28];
        $post->save();

        $res = new Resoure();
        $res->post_id=$post->id;
        $res->video=$video;
        $res-> image= $image;
        $res-> page_logo=$fb_page_logo;
        $res->save();
        $post_r = new Postrelated();
        $post_r->post_id=$post->id;
        $post_r->share = (int)$row[18];
        $post_r->like = (int)$row[20];
        $post_r->comment = (int)$row[19];
        $post_r->save();

       }
     }
    }

