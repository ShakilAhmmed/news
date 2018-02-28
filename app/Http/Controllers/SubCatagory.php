<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCatagoryModel;
use App\CatagoryModel;
use Session;
use Validator;
use Redirect;


class SubCatagory extends Controller
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
        $sub_catagory_data=SubCatagoryModel::paginate(5);
        $catagory_data=CatagoryModel::where('catagory_status','Active')->get();
        return view('admin.subcatagory.index',['sub_catagory_data'=>$sub_catagory_data,'catagory_data'=>$catagory_data]);
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
        $this->auth_check();
        $subcatagory=new SubCatagoryModel;
        $validation=Validator::make($request->all(),$subcatagory->validate());
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $subcatagory_data=$request->all();
            $subcatagory_data=array_add($subcatagory_data,'sub_catagory_id',time());
            $subcatagory->fill($subcatagory_data)->save();
            $request->session()->flash('success','Success');
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
        $sub_catagory_data=SubCatagoryModel::where('sub_catagory_id',$id)->first();
        if($sub_catagory_data->sub_catagory_status=='Active')
        {
            $sub_catagory_data->sub_catagory_status='Inactive';
            $sub_catagory_data->save();
            Session::flash('success','Status Updated Successfully');
            return back();
        }
        else
        {

            $sub_catagory_data->sub_catagory_status='Active';
            $sub_catagory_data->save();
            Session::flash('success','Status Updated Successfully');
            return back();
        }
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
        $sub_catagory_data=SubCatagoryModel::where('sub_catagory_id',$id)->first();
        $catagory_data=CatagoryModel::all();
        return view('admin.subcatagory.edit',['sub_catagory_data'=>$sub_catagory_data,'catagory_data'=>$catagory_data]);
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
        $subcatagory=new SubCatagoryModel;
        $validation=Validator::make($request->all(),$subcatagory->validate());
        if($validation->fails())
        {
            Session::flash('error','Field Is Required');
            return back();
        }
        else
        {
            $subcatagory_data=$subcatagory::find($id);
            $subcatagory_data->fill($request->all())->save();
            Session::flash('success','Updated Successfully');
            return back();
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
       $sub_catagory_data=SubCatagoryModel::find($id);
       $sub_catagory_data->delete();
       Session::flash('success','Sub Catagory Deleted Succesfully');
       return back();
    }
}
