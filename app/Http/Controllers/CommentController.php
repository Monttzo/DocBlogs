<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = comment::all();
        return $comments;
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
        $comment = new comment();
        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;
        $comment->content = $request->content;
        $comment->user_name = $request->user_name;

        $comment->save();

        return response()->json([
            'message' => 'comentario creado correctamente!',
            'comment' => $comment
        ],201);
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
    public function update(Request $request)
    {
        $comment = comment::findOrFail($request->id);
        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;
        $comment->content = $request->content;
        $comment->user_name = $request->user_name;

        $comment->save();
        return $comment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $comment = comment::destroy($request->id);
        return $comment;
    }
    /**
     * Retorna todos los comentarios que tiene un Post
     */
    public function postComments($id){
        $post = post::find($id);
        return $post->comments;
    }
}
