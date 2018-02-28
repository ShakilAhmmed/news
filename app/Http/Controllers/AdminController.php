<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
session_start();
class AdminController extends Controller
{
  

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

    public function adminLogin()
    {  
        $this->auth_check();
        return view('admin.home');
    }
}
