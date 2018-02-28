<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdvertiseModel;
use Session;
use Validator;
use Redirect;
use File;

class Advertise extends Controller
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
        return view('admin.advertise.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->auth_check();
        $advertise_data=AdvertiseModel::paginate();
        return view('admin.advertise.advertise_details',['advertise_data'=>$advertise_data]);
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
        $advertise=new AdvertiseModel;
        $validation=Validator::make($request->all(),$advertise->validate());
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $request_data=$request->all();
            if($request->hasfile('advertise_image'))
            {
                $file_extension=strtolower($request->file('advertise_image')->getClientOriginalExtension());
                $file_path="img/Advertise/";
                $file_name=time().".".$file_extension;
                $file_full_url=$file_path.$file_name;
                $request->file('advertise_image')->move($file_path,$file_name);
                $request_data=array_set($request_data,'advertise_image',$file_full_url);
            }
            $request_data=array_add($request_data,'advertise_id',time());
            $advertise->fill($request_data)->save();
            Session::flash('success','New Advertise Created Successfully');
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
        $this->auth_check();
        $advertise_data=AdvertiseModel::where('advertise_id',$id)->first();
        if($advertise_data->advertise_status=='Active')
        {
            $advertise_data->update(['advertise_status'=>'Inactive']);
        }
        else
        {
            $advertise_data->update(['advertise_status'=>'Active']);
        }
        Session::flash('success','Status Updated');
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
        $edit_data=AdvertiseModel::where('advertise_id',$id)->first();
        return view('admin.advertise.advertise_edit',['edit_data'=>$edit_data]);
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
        $advertise=new AdvertiseModel;
        $validation=Validator::make($request->all(),$advertise->validate());
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $request_data=$request->all();
            if($request->hasfile('advertise_image'))
            {
                $file_extension=strtolower($request->file('advertise_image')->getClientOriginalExtension());
                $file_path="img/Advertise/";
                $file_name=$id.".".$file_extension;
                $file_full_url=$file_path.$file_name;
                $request->file('advertise_image')->move($file_path,$file_name);
                $request_data=array_set($request_data,'advertise_image',$file_full_url);
            }
            
            $advertise::where('advertise_id',$id)->first()->fill($request_data)->save();
            Session::flash('success','Advertise Updated Successfully');
            return Redirect::to('/advertise/create');

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
        AdvertiseModel::where('advertise_id',$id)->delete();
        $file="img/Advertise/".$id.".jpg";
        File::delete($file);
        Session::flash('success','Advertisement Deleted Successfully');
        return back();
    }
}
