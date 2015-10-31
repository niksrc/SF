<?php namespace shyfirst\Http\Controllers;

use shyfirst\Http\Requests;
use shyfirst\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use shyfirst\Notifications;


class HomepageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		Notifications::notify('24','25');
	/*	if($request->cookie('shy_first_id') && $request->cookie('shy_first_sex')){
			if($request->cookie('shy_first_college'))
				return redirect('/findlove');
			else
				return redirect('/profile/complete');
		}
		return view('homepage');
	*/}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function saveUser(Response $response,Request $request)
	{  
		$despo = new Valentine();
		$Userexists = Valentine::getExistingUser($request->input('id'));
		 ;
		
		if(is_object($Userexists)){
			
			if(!is_null($Userexists->interests)){
				$response->setContent('/findlove');    
				$response->withCookie(cookie()->forever('shy_first_college', $Userexists->college));
			}else
				$response->setContent('/profile/complete');

			$response->withCookie(cookie()->forever('shy_first_id', $Userexists->id));
			$response->withCookie(cookie()->forever('shy_first_sex', $Userexists->sex));
		
		}else{

			$despo->name   = $request->input('name');
			$despo->age    = $request->input('birthday','');
			$despo->sex    = $request->input('gender');
			$despo->userId = $request->input('id');
			$despo->tel    = $request->input('name');
			$despo->social = $request->input('social');
			$despo->url    = $request->input('link');
			$despo->email  = $request->input('email');
			
			if($despo->save()){
				$response->setContent('/profile/complete');    
				$response->withCookie(cookie()->forever('shy_first_id',$despo->id));
				$response->withCookie(cookie()->forever('shy_first_sex',$request->input('sex')));
			}
		}
		return $response;
	}


}
