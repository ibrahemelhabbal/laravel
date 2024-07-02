<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        //select * from posts;
        $postsFromDB = Post::all(); //collection object

        //id, title (Var char), description(TEXT), created_at, updated_at

        return view('posts.index', ['posts' => $postsFromDB]);
    }

    //convention over configuration
    public function show(Post $post) //type hinting
    {


        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        //select * from users;
        $users = User::all();

        return view('posts.create', ['users' => $users]);
    }

    public function store()
    {
        //code to validate the data

        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
        ]);


        //1- get the user data
        $data = request()->all();

        $title = request()->title;
        $description = request()->description;

        Post::create([
            'title' => $title,
            'description' => $description,
        ]);

        //3- redirection to posts.index
        return to_route('dashboard');
    }

    public function edit($post_id)
    {
        //select * from users;    
        $post = Post::find($post_id);
        return view('posts.edit',compact('post_id' , 'post'));
    }

    public function update($postId)
    {
        //1- get the user data

        $title = request()->title;
        $description = request()->description;


        //2- update the submitted data in database
            //select or find the post
            //update the post data
        $singlePostFromDB = Post::find($postId);
        $singlePostFromDB->update([
            'title' => $title,
            'description' => $description,
        ]);

//        dd($singlePostFromDB);

        //3- redirection to posts.show
        return to_route('dashboard');
    }

    public function destroy($postId)
    {
        //1- delete the post from database
            //select or find the post
            //delete the post from database
        $post = Post::find($postId);
        $post->delete();
        //2- redirect to posts.index
        return to_route('dashboard');
    }
}
