<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comments;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request, Post $post)
     {
        $data = [
            'user_id' =>auth()->id(),
            'post_id' => $post->id,
            'text'=> $request->comment,
        ];
        Comments::create($data);

         return redirect()->back();
     }

    public function update(Request $request, Comments $comments)
    {
        $comments->update($request->validate([
            'text' => 'required'
        ]));
        return redirect()->back();
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comments $comments)
    {
        if(auth()->id() == $comments->user_id){
            $comments->delete();
        }
        return redirect()->back();
    }

}
