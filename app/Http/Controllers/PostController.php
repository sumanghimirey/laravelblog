<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $post=Post::orderBy('id','asc')->paginate(5);
        return view('posts.index')->withPost($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('posts.create');
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
        //validate the data
        $this->validate($request,array(
            'title'=>'required|max:255',
            'body'=>'required'
                ));

        //store to database
        $post=new Post;

        $post->title=$request->title;
        $post->body=$request->body;
        $post->save();

        //redirected to another page

        Session::flash('success','Your blog post successfully posted!!');

        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);

        return view('posts.edit')->withPost($post);

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
        $this->validate($request,array(     //validate the data first
            'title'=>'required|max:255',
            'body'=>'required'
                ));
        $post=Post::find($id);               //grab the data from existing record

        $post->title=$request->input('title');  //grab the data from existing record
        $post->body=$request->input('body'); //grab the data from existing record
        $post->save();                            //commite the change and save to database

        return redirect()->route('posts.show',$post->id); //redirected changes to show;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();

        return redirect()->route('posts.index');
    }
}
