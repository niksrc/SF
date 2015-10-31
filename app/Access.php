<?php namespace shyfirst;

use Illuminate\Database\Eloquent\Model;

class Access extends Model {
     protected $table = 'access';	
	 public $timestamps = false;

	 public static function getStatus($desperate,$cool){
	 	$temp1 = Access::where('desperate','=',$desperate,'and','cool','=',$cool)->first();
	 	$temp2 = Access::where('desperate','=',$cool,'and','cool','=',$desperate)->first();
	 
		if($temp1&&$temp2){
		 	return true;
		}else
		 	return false;
	 }
	 
}
