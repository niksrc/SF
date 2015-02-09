<?php namespace shyfirst;

use Illuminate\Database\Eloquent\Model;
use shyfirst\Access;
class Valentine extends Model {
	
	protected $table = "valentine";
	public $timestamps = false;

	public function getProfile($cool){
		if($this->desperate===$cool){
			return Valentine::find($cool);
		}else{
			$cols = Access::getAttr($this->desperate,$cool);
			$cols = explode(',',$cols);
			return Valentine::find($cool)->select($cols)->first();
		}
	}
}
