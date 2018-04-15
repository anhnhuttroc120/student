<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Student extends Model
{
   protected $table='student';
   
  protected $fillable = ['name', 'date_of_birth', 'class_id','address','user_id'];
  // protected $lifestamp=true;
  
   public function school(){
   	return $this->belongsTo('App\School','class_id','id');
   }

  public function nguoitao(){
  	return $this->belongsTo('App\User','user_id','id');
  }
   

   // public function permisionEdit(){
   // 		$currentUser=Auth::user();
   // 		if(($currentUser->is_admin) || ($this->user_id == $currentUser->user_id)){
   // 			return true;
   // 		}
   // 		return false;
   // }

}