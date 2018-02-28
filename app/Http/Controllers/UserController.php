<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatagoryModel;
use App\SubCatagoryModel;
use App\PostModel;
use App\Comment;
use App\User;
use Validator;
use Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=PostModel::groupBy('catagory_name')->where('post_status','Active')->orderBy('post_id','DESC')->paginate(3);
        return view('layouts.user_post',['post'=>$post]);
    }

    public function single_post($id)
    {
       $post_value=PostModel::where('post_id',$id)->first();
       $post_value->increment('post_count');
       $comment=Comment::join('users','users.id','=','comment.user_id')
                        ->where('comment.comment_status','Active')->get();
       return view('single_post',['post_value'=>$post_value,'comment'=>$comment]);
    }

    public function details($name)
    {
       $details=PostModel::where('catagory_name',$name)->where('post_status','Active')->paginate(3);
       return view('details',['details'=>$details,'name'=>$name]);
    }

    public function sub_details($name)
    {
       $details=PostModel::where('sub_catagory_name',$name)->where('post_status','Active')->paginate(3);
       
       return view('sub_details',['details'=>$details,'name'=>$name]);
    }

    public function comment(Request $request)
    {
       $comment=new Comment;
       $validation=Validator::make($request->all(),$comment->validate());
       if($validation->fails())
       {
         return back()->withInput()->withErrors($validation);
       }
       else
       {
          $request_data=$request->all();
          $request_data=array_add($request_data,'comment_id',time());
          $comment->fill($request_data)->save();
          Session::flash('success','Comment Is Waiting For Admin Aproval');
          return back();
       }
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
  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
