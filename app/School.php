<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
 protected $table='school';



 public function students(){
 	return $this->hasMany('App\Student','class_id','id');
 }
}
