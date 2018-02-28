<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatagoryModel;
use PDF;
class PdfController extends Controller
{
    public function catagory_pdf()
    {
        $catagory = CatagoryModel::all();
        view()->share('catagory',$catagory);
        $pdf = PDF::loadView('admin.catagory.export.catagorypdf');
        //return $pdf->download('admin.catagory.export.catagorypdf');
        return view('admin.catagory.export.catagorypdf');

        //$data=create_admin_model::all();
        // $html = view('admin.catagory.export.catagorypdf',['catagory'=>$catagory])->render();
        // return PDF::load($html)->show();
    }
}
