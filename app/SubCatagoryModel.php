<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCatagoryModel extends Model
{
    protected $table="sub_catagory";
    protected $primaryKey="sub_catagory_id";
    protected $fillable=[
                         'catagory_name',
                         'sub_catagory_name',
                         'sub_catagory_title',
                         'sub_catagory_description',
                         'sub_catagory_status',
                         'sub_catagory_id'
                         ];
    public function validate()
    {
      return [
             'catagory_name'=>'required',
             'sub_catagory_name'=>'required',
             'sub_catagory_title'=>'required',
             'sub_catagory_description'=>'required',
             'sub_catagory_status'=>'required',
             ];

    }
}
