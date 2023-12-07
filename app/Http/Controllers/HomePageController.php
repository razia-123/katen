<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
public function index(){
$Featured_posts = Post::latest()
->where('is_feature',true)
->where('status',true)
->with(['category:id,name,slug','user:id,name'])
->select(['id','user_id','category_id','title','featured_image','short_description','created_at'])
->take(3)
->get();


    $posts = Post::latest()

    ->where('status',true)
    ->with(['category:id,name,slug','user:id,name,profile'])
    ->select(['id','user_id','category_id','title','featured_image','short_description','created_at'])
    ->paginate(3);

return view('frontend.index', compact('Featured_posts','posts'));
}

public function showPost($slug){
$post = Post::where('slug',$slug)
->with(['category:id,name,slug','user:id,name,profile'])
->first();

return view('frontend.post_single',compact('post'));
}

}
