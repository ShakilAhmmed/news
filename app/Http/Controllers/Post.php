<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostModel;
use App\CatagoryModel;
use App\SubCatagoryModel;
use Session;
use Validator;
use Redirect;
class Post extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function auth_check()
    {
      $admin_info=Session::get('admin_id');
      if($admin_info)
      {
        return;
      }
      else
      {
        return Redirect::to('/xyz')->send();
      }
  }
    
    public function index()
    {
        $this->auth_check();
        $catagory=Catagorymodel::where('catagory_status','Active')->get();
        return view('admin.post.index',['catagory'=>$catagory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->auth_check();
        $post=PostModel::where('post_status','Active')->paginate(5);
        return view('admin.post.aprove_post',['post'=>$post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->auth_check();
        $post=new PostModel;
        $validation=Validator::make($request->all(),$post->validate());
        if($validation->fails())
        {
           return back()->withInput()->withErrors($validation);
        }
        else
        {
            $file_extension=strtolower($request->file('post_image')->getClientOriginalExtension());
            $file_path="img/Post/";
            $file_name=time().".".$file_extension;
            $file_full_url=$file_path.$file_name;
            $request->file('post_image')->move($file_path,$file_name);
            $request_data=$request->all();
            $request_data=array_add($request_data,'post_id',time());
            $request_data=array_set($request_data,'post_image',$file_full_url);
            $post->fill($request_data)->save();
            Session::flash('success','Successfully Inserted');
            return back();


        }
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


    public function sub_catagory_data(Request $request)
    {
       return SubCatagoryModel::where('catagory_name',$request->catagory_name)->get();
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
