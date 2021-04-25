<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\NewPostNotification;
use App\Events\NewWhisperingNotification;
use App\Models\Post;
use App\Models\UsersList;
use App\Models\LikePost;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data["user_id"]=Auth::user()->id;
        $postTime = post::all();
        $postTime = $postTime->reverse();
        $data['posts']= $postTime;
        $data["usersList"] = UsersList::all();
        return view('home',$data);
    }

    public function crearPostRoute(){
        $data["user_id"]=Auth::user()->id;
        $data['users']=UsersList::all();
        return view('crearPost',$data);
    }

    public function addDataBasePost(Request $request){
        //dd("error");
        $post = new Post;
        $post->setAttribute('author', Auth::user()->id);
        $post->setAttribute('to', $request->to);
        $post->setAttribute('post', $request->post);
        $post->save();
        
        event(new NewPostNotification($post));
        event(new NewWhisperingNotification($post));

        //return redirect('crearPost');
        return redirect('home');
    }



    public function likePost($id){
        $likeExist = LikePost::where([
            ['id_user', Auth::user()->id],
            ['id_post', $id]
        ])->get();
        $res = false;
        foreach ($likeExist as $like){
            $res = true;
            LikePost::destroy($like->id);
        }

        if (!$res){
            $like = new LikePost;
            $like->setAttribute('id_user', Auth::user()->id);
            $like->setAttribute('id_post', $id);
            $like->save();

            $post = Post::find($id);
            $post->likes = $post->likes + 1;

            $post->save();
            
            echo "entra<br>";
        }else {
            $post = Post::find($id);
            $post->likes = $post->likes - 1;

            $post->save();
            echo "no entra<br>";
        }
        //
        //print_r ($likeExist);
        //echo "<br>Illuminate\Database\Eloquent\Collection Object ( [items:protected] => Array ( ) )";

        return redirect('home');
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
