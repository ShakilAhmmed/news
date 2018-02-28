<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatagoryModel extends Model
{
	protected $table="catagory";
	protected $primaryKey="catagory_id";
	protected $fillable=[
		                
		                'catagory_name',
		                'catagory_title',
		                'catagory_description',
		                'catagory_status',
		                'catagory_id'
		            ];

    public function validate()
    {

    	return [
                'catagory_name'=>'required',
		        'catagory_title'=>'required',
		        'catagory_description'=>'required',
		        'catagory_status'=>'required'
               ];
    }
}
