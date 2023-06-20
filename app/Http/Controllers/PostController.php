<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth',['except'=>['index','show']]);
    }

     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('post.index' , [
            'posts' => Post::where('status','publish')->get() 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {   
        $imageName="";
        if (isset($request->image)){    
            $imageName = time().'.'.$request->image->extension();           
            $request->image->move(public_path('images/posts'), $imageName);
        }

        $post=Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $imageName
        ]);

        return view('post.show',[
            'post' => $post
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return view('post.show',[
            'post' => Post::find($request->id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        return view('post.edit',[
            'post' => Post::find($request->id)
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $post=Post::find($request->id);

        if ($request->image!=$post->image){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images/posts'), $imageName);

            File::delete(public_path('/images/posts/').$post->image);

            $post->image=$imageName;
        }

        $post->title=$request->title;
        $post->body=$request->body;

        $post->save();

        return view('post.show',[
            'post' => Post::find($request->id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $requet)
    {   
        if($post=Post::find($requet->id)){

            if ($post->delete()){

                File::delete(public_path('/images/posts/').$post->image);
                
                return $this->index();

            }else{
                return redirect()->back()->with([
                    'message' => 'post remover failed'
                ]);
            }
        }else{
            return redirect()->back()->with([
                'message' => 'post not found'
            ]);
        }

    }


    public function biding(){
        return view('post.biding',[
            'posts' => Post::where('status' , 'biding')->get()
        ]);
    }
    public function published(){
        return view('post.published',[
            'posts' => Post::where('status' , 'publish')->get()
        ]);
    }
    public function unpublished(){
        return view('post.unpublished',[
            'posts' => Post::where('status' , 'unpublish')->get()
        ]);
    }
    

}
