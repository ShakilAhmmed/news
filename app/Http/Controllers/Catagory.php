<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatagoryModel;
use Session;
use Redirect;
use Validator;

class Catagory extends Controller
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
        $catagory_data=CatagoryModel::paginate(5);
        return view('admin.catagory.index',['catagory_data'=>$catagory_data]);   
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
         $catagory=new CatagoryModel;
         $validation=Validator::make($request->all(),$catagory->validate());
         if($validation->fails())
         {
            return back()->withInput()->withErrors($validation);
         }
         else
         {
            $catagory_data=$request->all();
            $catagory_data=array_add($catagory_data,'catagory_id',time());
            $catagory->fill($catagory_data)->save();
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
        $catagory_data=CatagoryModel::where('catagory_id',$id)->first();
        if($catagory_data->catagory_status=='Active')
        {
           $catagory_data->catagory_status = 'Inactive';
           $catagory_data->save();
            Session::flash('success','Status Updated');
            return back();
        }
        else
        {
           $catagory_data->catagory_status = 'Active';
           $catagory_data->save(); 
           Session::flash('success','Status Updated');
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
        $data=CatagoryModel::where('catagory_id',$id)->first();
        return view('admin.catagory.edit',['data'=>$data]);
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
       $catagory=new CatagoryModel;
       $validation=Validator::make($request->all(),$catagory->validate());
       if($validation->fails())
       {
         Session::flash('error','Field Is Empty');
         return back();
       }
       else
       {
         $catagory_data=$catagory::find($id);
         $catagory_data->fill($request->all())->save();
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
        $delete = CatagoryModel::find($id);
        $delete->delete();
        Session::flash('success','Deleted Successfully');
        return back();
    }
}
