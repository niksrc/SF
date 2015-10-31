<?php namespace shyfirst\Http\Controllers;

use shyfirst\Http\Requests;
use shyfirst\Http\Controllers\Controller;
use shyfirst\Valentine;
use shyfirst\Access;
use shyfirst\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ValentineController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
			 Session::set('shy_first_id','1');
			 Session::set('shy_first_sex','M');
			 $despo = new Valentine();
			 $despo->desperate = Session::get('shy_first_id');
			 print_r($despo->getProfile($id));	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function completeProfile()
	{
		 $despo = new Valentine();
		 return view('completeProfile');	
	}

	public function browse(){
		return view('browse');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function notify($id)
	{
		if(Access::getStatus(Session::get('shy_first_id'),$id)){
			$despo_notification = new Notifications();
			$cool_notiification = new Notifications();
			
			$despo_notification->valentineId = Session::get('shy_first_id');
			$cool_notification->valentineId = $id;
			
			$despo = Valentine::find(Session::get('shy_first_id'));
			$cool = Valentine::find($id);

			$despo_notification->content = $cool->name." is intrested in you";
			$cool_notiification->content = $despo->name." is intrested in you";
			 
			$despo_notification->coolId = $cool->id;
			$cool_notiification->coolId = $despo->id; 

			$despo_notification->save();
			$cool_notiification->save();

		}
				
	}

	public function getNotifications($id){
		return Notifications::where('valentineId','=',$id)->get()->toJson();
	}

	public function changeViewStatus($id){
		$Notification = Notifications::find($id);
		$Notification->status = 0;
		if($Notification->save())
			return Response::Json(array('error'=>false,'msg'=>'Notification is updated'),200) ;    
	   	else
        	return Response::Json(array('error'=>true,'msg'=>'Issue in updating'),200) ; 
		
	}
	
	public function getAccess($id){
		//save access request
		$accessRequest = new Access();
		$accessRequest->desperate = Session::get('shy_first_id');
		$accessRequest->cool = $id;
		$accessRequest->save();

		//check if request from both side then notify
		if(Access::getStatus(Session::get('shy_first_id'),$id)){
			Valentine::Notify($id,Session::get('shy_first_id'));
			return Response::Json(array('error'=>false,'msg'=>'Notified'),200);    
		}



	}
}
