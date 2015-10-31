<?php namespace shyfirst;

use Illuminate\Database\Eloquent\Model;
use shyfirst\Access;
use Illuminate\Support\Facades\DB;
class Valentine extends Model {
	
	protected $table = "valentine";
	public $timestamps = false;

	public static function searchProfile($college,$sex,$offset=0){
		return Valentine::where('sex','<>',$sex)->where('college',$college)->skip($offset)->take(6)->get();
	}

	public static function getDistinctColleges(){
		return DB::table('valentine')->select(DB::raw('distinct college'))->get();
	}
	
	public static function getExistingUser($Id){
		return Valentine::where('userId',$Id)->first();
	}

}
