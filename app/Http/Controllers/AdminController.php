<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function new_posts(){

        return view('admin.new-posts' , [
            'posts' => Post::where('status' , 'biding')->get()
        ]);
    }

    public function published_posts(){
        return view('admin.published-posts' , [
            'posts' => Post::where('status' , 'publish')->get()
        ]);
    }

    public function unpublished_posts(){
        return view('admin.unpublished-posts' , [
            'posts' => Post::where('status' , 'unpublish')->get()
        ]);
    }
    public function users(){
        return view('admin.users' , [
            'users' => User::get()
        ]);
    }


    public function publish(Request $request){

        DB::table('posts')->where('id',$request->id)->update([
            'status' => 'publish'
        ]);

        return $this->new_posts();
    }

    public function unpublish(Request $request){

        DB::table('posts')->where('id',$request->id)->update([
            'status' => 'unpublish'
        ]);

        return $this->new_posts();
    }
}
