<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $post=PostModel::groupBy('catagory_name')->where('post_status','Active')->orderBy('post_id','DESC')->paginate(3);
        return view('layouts.user_post',['post'=>$post]);
    }
}
