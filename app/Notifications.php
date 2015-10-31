<?php namespace shyfirst;

use Illuminate\Database\Eloquent\Model;
use shyfirst\Valentine;
use Illuminate\Support\Facades\Mail;

class Notifications extends Model {
	 protected $table = 'notifications';	
	 public $timestamps = false;

	 public static function notify($despoId,$coolId){
	 	$despoNotification = new Notifications();
	 	$coolNotification  = new Notifications();
	 	
	 	$despoNotification->valentineId = $despoId;
	 	$coolNotification->valentineId  = $coolId;
	 	
	 	$despo = Valentine::find($despoId);
	 	$cool = Valentine::find($coolId);


	 	$despoNotification->coolId = $coolId;
	 	$coolNotification->coolId  = $despoId;

	 	$despoNotification->name = $cool->name;
	 	$coolNotification->name  = $despo->name;
	 	
	 	$despoNotification->save();
	 	$coolNotification->save();

	 	Mail::send('emails.match', ['id' => $cool->id], function($message) use($despo,$cool)
	 	{
	 	    $message->to($despo->email, $despo->name)->subject($cool->name.'Likes You too');
	 	});
	 	Mail::send('emails.match', ['id' => $despo->id], function($message) use($cool,$despo)
	 	{
	 	    $message->to($cool->email, $cool->name)->subject($despo->name.'Likes You too');
	 	});

	 }
}
