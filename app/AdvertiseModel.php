<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertiseModel extends Model
{
    protected $table="advertise";
    protected $primaryKey="advertise_id";
    protected $fillable=[
                        'advertise_title',
                        'avdertise_description',
                        'advertise_image',
                        'advertise_creator',
                        'advertise_status',
                        'advertise_id'
                        ];



   public function validate()
   {
       return [
              'advertise_title'=>'required',
              'advertise_image'=>'mimes:jpg,png,jpeg',
              'advertise_creator'=>'required',
              'advertise_status'=>'required'
              ];
   }
}
