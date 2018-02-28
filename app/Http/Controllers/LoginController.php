<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;
session_start();
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.index');
    }
   
    public function auth_status()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id)
        {
            return Redirect::to('/admin')->send();
        }
        else
        {
            return;
        }
    }
   

    public function adminLoginCheck(Request $request)
    {
       $admin_info=DB::table('admin')
                  ->select('*')
                  ->where('admin_email',$request->email)
                  ->where('admin_password',md5($request->pass))
                  ->first();
       if($admin_info)
       {

         Session::put('admin_id',$admin_info->id);
         Session::put('admin_name',$admin_info->admin_name);
         return Redirect::to('/admin');
       }
       else
       {
          Session::put('message','Email And Password Not Match');
          return Redirect::to('/xyz');
       }
    }

    public function adminLogout()
    {
        Session::put('admin_id','');
        Session::put('admin_name','');
        return Redirect::to('/xyz');
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
