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

class PostImport implements ToCollection { 
      public function collection(Collection $rows) { 
    
       foreach($rows as $key=> $row){
        if($key == 0){
               continue;     
           }
           if($row[7]){
            $test=  Str::afterLast($row[7], '/');
            $link1 =  Str::replaceFirst($test,'20'.$test,$row[7]);
            $row7 = str_replace( '/', '-', $link1);
           }
           if($row[8]){
            $test1=  Str::afterLast($row[8], '/');
            $link2 =  Str::replaceFirst($test1,'20'.$test,$row[8]);
            $row8 = str_replace( '/', '-', $link2);
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
               $related->last_seen=$row8;
               $newpost->last_seen=$row8;
               
               
               $related->save();
               $newpost->save();
               continue;
               }
           }
           
        
          
        //    if($row[4] != null){
        //     try{
 
        
        //         $cover = file_get_contents( $row[4] );
            
        //         $name_cover = substr($cover, strrpos($cover, '/upload/') + 1);
        //         // dd($name_cover);
              
        //     $new = '/uploads/'.rand(0,1000000000).'.mp4';
            
        //     Storage::put($new, $cover);
            
        //     }catch (\Exception $e) {
        //         return 'its null';
        //     } 
        // }else{
        //     return 'its null';

        // }
  
       
        if($row[5] != null){
            try{
 
        
                $cover = file_get_contents( $row[5] );
            
                $name_cover = substr($cover, strrpos($cover, '/upload/') + 1);
                // dd($name_cover);
              
            $image = '/uploads/'.rand(0,1000000000).'.jpg';
            
            Storage::put($image, $cover);
            
            }catch (\Exception $e) {
                continue;
            } 
        }else{
            continue;
        }
        if($row[22]!= null){
            try{
 
        
                $cover = file_get_contents( $row[22] );
            
                $name_cover = substr($cover, strrpos($cover, '/upload/cover/') + 1);
              
            $fb_page_logo = rand(0,1000000000).'.jpg';
            
            Storage::put($fb_page_logo, $cover);
            
            }catch (\Exception $e) {
             $fb_page_logo = 'its null';
            }    
        }else{
            $fb_page_logo = 'its null';
     
        }
        if($row[4]!= null){
            try{
 
        
                $cover = file_get_contents($row[4] );
            
                $name_cover = substr($cover, strrpos($cover, '/upload/cover/') + 1);
              
            $vidoe = rand(0,1000000000).'.jpg';
            
            Storage::put($vidoe, $cover);
            
            }catch (\Exception $e) {
             $vidoe = 'its null';
            }    
        }
        
        $post = new Post();
        $post->page_id=$row[0];
        $post->post_id =$row[1];
        $post->ad_format    = $row[2]; 
        $post->landanig_page =$row[3];
        $post->post_link=$row[6];
        $post->post_create=$row7;
        $post->last_seen=$row8;
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
        $res->video=$vidoe; 
        $res-> image=$image;
        $res-> page_logo=$fb_page_logo;
        $res->save();
        
          
       }
     }
    }



// class PostImport implements ToModel, WithHeadingRow
// {
//     public function model(array $row)
//     {
//         // dd($row['video_link']);
//         if($row['video_link'] != null){
//             try{
 
        
//             $cover = file_get_contents( $row['video_link'] );

//             $name_cover = substr($cover, strrpos($cover, '/upload/cover/') + 1);
        
//         $new = rand(0,1000000000).'.mp4';
//         // dd($new);

//         Storage::put($new, $cover);

//         }catch (\Exception $e) {
//             // dd('ff');
//         $new = 'its null';
//         }
//         }else{
//             $new = 'its null';
//         }
       
//         if($row['image_link'] != null){
//             try{
 
        
//                 $cover = file_get_contents( $row['image_link'] );
            
//                 $name_cover = substr($cover, strrpos($cover, '/upload/') + 1);
//                 // dd($name_cover);
              
//             $image = '/uploads/'.rand(0,1000000000).'.jpg';
            
//             Storage::put($image, $cover);
            
//             }catch (\Exception $e) {
//              $image = 'its null';
//             } 
//         }else{
//             $image = 'its null';
//         }
//         if($row['fb_page_logo']!= null){
//             try{
 
        
//                 $cover = file_get_contents( $row['fb_page_logo'] );
            
//                 $name_cover = substr($cover, strrpos($cover, '/upload/cover/') + 1);
              
//             $fb_page_logo = rand(0,1000000000).'.jpg';
            
//             Storage::put($fb_page_logo, $cover);
            
//             }catch (\Exception $e) {
//              $fb_page_logo = 'its null';
//             }    
//         }else{
//             $fb_page_logo = 'its null';
     
//         }

        
//         $post =  new Post([
//             'post_id'     => $row['post_id'],
//             'ad_format'    => $row['ad_format'], 
//             'landanig_page' =>$row['landing_page_link'],
        
//             'post_create'=>$row['post_link'],
//             'post_create'=>$row['post_created'],
//             'last_seen'=>$row['last_seen'],
//             'interested'=>$row['intersted'],
//             'gender'=>$row['gender'],
//             'age'=>$row['age'],
//             'country'=>$row['country_account'],
//             // 'image'=>$row['country_ad'],
//             'lang'=>$row['language_ad'],
//             'page_link'=>$row['page_link'],
//             'button'=>$row['button'],
//             'share'=>$row['shares_number'],

//             'comment'=>$row['comment_number'],
//             'like'=>$row['likes_number'],
//             'page_name'=>$row['facebook_page_name'],
//             'Ad_Description'=>$row['ad_description'],
//             'title'=>$row['ad_title'],

//         ]);
//         return new Resoure([
//             'post_id'=>$post->id,
//             'video'=>$new,
//             'image'=>$image,
//             'page_logo'=>$fb_page_logo,
//         ]);

//     }
// }



// // image upload 
// // try{
 
        
// //     $cover = file_get_contents( $url );

// //     $name_cover = substr($cover, strrpos($cover, '/upload/cover/') + 1);
  
// // $new = rand(0,1000000000).'.mp4';

// // Storage::put($new, $cover);

// // }catch (\Exception $e) {
// //  $new = 'its null';
// // }