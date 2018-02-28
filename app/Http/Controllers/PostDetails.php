<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostModel;
use App\CatagoryModel;
use File;
use Session;
use Validator;
use Redirect;
class PostDetails extends Controller
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
        $post=PostModel::paginate(5);
        return view('admin.post.post_details',['post'=>$post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->auth_check();
        $post=PostModel::where('post_status','Inactive')->paginate(5);
        return view('admin.post.pending_post',['post'=>$post]);
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
        $this->auth_check();
        $post_data=PostModel::where('post_id',$id)->first();
        if($post_data->post_status=='Active')
        {
            $post_data->update(['post_status'=>'Inactive']);
        }
        else
        {
            $post_data->update(['post_status'=>'Active']);
        }

        Session::flash('success','Status Updated Successfully');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->auth_check();
        $edit_data=PostModel::where('post_id',$id)->first();
        $catagory=Catagorymodel::where('catagory_status','Active')->get();
        return view('admin.post.post_edit',['edit_data'=>$edit_data,'catagory'=>$catagory]);
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
        $this->auth_check();
       $post=new PostModel;
       $validation=Validator::make($request->all(),$post->validate());
       if($validation->fails())
       {
           return back()->withInput()->withErrors($validation);
       }
       else
       {
           $request_data=$request->all();
           if($request->hasfile('post_image'))
           {
                $file_extension=strtolower($request->file('post_image')->getClientOriginalExtension());
                $file_path="img/Post/";
                $file_name=$id.".".$file_extension;
                $file_full_url=$file_path.$file_name;
                $request->file('post_image')->move($file_path,$file_name);
                $request_data=array_set($request_data,'post_image',$file_full_url);
           }
           $post::where('post_id',$id)->first()->fill($request_data)->save();
           Session::flash('success','Post Updated Successfully');
           return Redirect::to('/post-details');

       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->auth_check();
        $imgpath="img/Post/".$id."jpg";
        PostModel::where('post_id',$id)->delete();
        File::delete($imgpath);
        Session::flash('success','Post Deleted Successfully');
        return back();
    }
}
