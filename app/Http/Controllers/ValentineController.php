<?php namespace shyfirst\Http\Controllers;

use shyfirst\Http\Requests;
use shyfirst\Http\Controllers\Controller;
use shyfirst\Valentine;
use shyfirst\Access;
use shyfirst\Notifications;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class ValentineController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function showCompleteProfile(){
		$colleges = Valentine::getDistinctColleges();
		return view('completeProfile',array('colleges'=>$colleges));
	}

	public function showProfileEditor(Request $request){
		$valentineId = $request->cookie('shy_first_id');
		$me = Valentine::find($valentineId)->toArray();
		$colleges = Valentine::getDistinctColleges();
		$Notifications = Notifications::where('valentineId','=',$valentineId)->get()->toArray();
		$data  = array('me' => $me,'colleges'=>$colleges,'Notifications'=>$Notifications);
		
		return view('editProfile',$data);		
	}

	public function updateProfile(Request $request){
		$despo = Valentine::find($request->cookie('shy_first_id'));
		
		if($request->has('college'))
			$despo->college   = $request->input('college');
		if($request->has('newCollege'))
			$despo->college   = $request->input('newCollege');

		if($request->has('interests'))
			$despo->interests  = $request->input('interests');
		if($request->has('lookingFor'))
			$despo->lookingFor   = $request->input('lookingFor');
		if($request->has('bio'))
			$despo->bio   = $request->input('bio');

		$college = $despo->college;
		if($despo->save()){
			return redirect('/findlove')->withCookie(cookie()->forever('shy_first_college',$college));			
		}else
			return redirect('/complete/profile');
	}


	

	public function browse(Request $request){
		$valentineId = $request->cookie('shy_first_id');
		$sex = $request->cookie('shy_first_sex');
		if($request->has('college'))
	    	$college = $request->input('college');
	    else
    		$college = $request->cookie('shy_first_college');
 		$colleges = Valentine::getDistinctColleges();
		$Notifications = Notifications::where('valentineId','=',$valentineId)->get()->toArray();
		$cool = Valentine::searchProfile($college,$sex)->toArray();
		$data  = array('colleges'=>$colleges,'college'=>$college,'cool'=>$cool,'Notifications'=>$Notifications);
		return view('browse',$data);
	}

	public function match($id,Request $request){
		$valentineId = $request->cookie('shy_first_id');
		$this->changeViewStatus($id);
		$Notifications = Notifications::where('valentineId','=',$valentineId)->get()->toArray();
		foreach ($Notifications as $key => $value) {
			if($value['id'] === $id);
				$coolId = $value['coolId'];
		}
		$cool = Valentine::find($coolId)->toArray();
		$data  = array('cool'=>$cool,'Notifications'=>$Notifications);
		return view('match',$data);
	}

	
	public function getNotifications(Request $request){
		$id = $request->cookie('shy_first_id');
		return Notifications::where('valentineId','=',$id)->get()->toJson();
	}

	public function search(Request $request){
		$cool = Valentine::searchProfile($request->input('college'),$request->cookie('shy_first_sex'),$request->input('offset'))->toJson();
		return $cool;
	}

	public function changeViewStatus($id){
		$Notification = Notifications::find($id);
		$Notification->active = 0;
		if($Notification->save())
			return true;
	   	else
        	return false; 
		
	}
	
	public function getAccess($id,Request $request,Response $response){
		//save access request
		$accessRequest = Access::where('desperate',$request->cookie('shy_first_id'))->where('cool',$id)->first();
		if(!is_object($accessRequest)){			
			$accessReq = new Access();
			$accessReq->desperate =  $request->cookie('shy_first_id');
			$accessReq->cool = $id;
			$accessReq->save();
		}else{
			return 'false';
		}


		if(Access::getStatus($request->cookie('shy_first_id'),$id)){
			Notifications::notify($id, $request->cookie('shy_first_id'));
			return 'true';
		}

	}
}
