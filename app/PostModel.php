<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table="post";
    protected $primaryKey="post_id";
    protected $fillable=[
                        'catagory_name',
                        'sub_catagory_name',
                        'post_title',
                        'post_description',
                        'post_image',
                        'post_creator',
                        'post_status',
                        'post_count',
                        'post_id',

                        ];

    public function validate()
    {
         return [
                'catagory_name'=>'required',
                'sub_catagory_name'=>'required',
                'post_title'=>'required',
                'post_description'=>'required',
                'post_image'=>'mimes:jpg,jpeg,png',
                'post_status'=>'required'
                ];

    }
}
