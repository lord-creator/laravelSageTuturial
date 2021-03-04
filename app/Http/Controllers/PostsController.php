<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PostsController extends Controller

{
public function __construct()
{
    $this->middleware('auth');

}
public function index()
{
    //$user = new \App\User();
    $users = auth()->user()->following()->pluck('profiles.user_id');

    $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
     $suser = User::all()->pluck('id');
    //$userr = $suser->pluck('id');

    $postss = Profile::whereIn('user_id', $suser)->latest()->get();
    //$postss = Profile::all()->pluck('user_id')->paginate(3);
      //$jj = $postss->id;
    // dd($postss);
      return view('posts.index', compact('posts', 'postss'));
}







    public function create()
    {
        return view('posts.create');
    }


    public function store()
    {
     $data = request()->validate([
         'caption' => 'required',
         'image' => ['required', 'image'],
     ]);

    $imagePath = request('image')->store('uploads', 'public');
    $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
    $image->save();
    auth()->user()->posts()->create([
    'caption' => $data['caption'],
    'image' => $imagePath,
]);



return redirect('/profile/' . auth()->user()->id);
    }
    public function show(\App\Post $post)
   {
      return view('posts.show', compact('post'));
   }
}
