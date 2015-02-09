<?php namespace shyfirst;

use Illuminate\Database\Eloquent\Model;

class Access extends Model {
     protected $table = 'access';	
	 public $timestamps = false;

	 public static function getAttr($desperate,$cool){
	 	$temp = Access::where('desperate','=',$desperate)->first();
	 	return $temp->attr;
	 }
}
