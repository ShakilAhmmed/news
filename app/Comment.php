<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table="comment";
    protected $primaryKey="comment_id";
    protected $fillable=['user_id','post_id','comment','comment_status'];
    
   public function validate()
   {
   	 return [
              'comment'=>'required',
              'comment_status'=>'required'
   	        ];
   }
}
