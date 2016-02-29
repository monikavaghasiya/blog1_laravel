<?php namespace App\Handlers\Events;

use App\Events\Event;
use Mail;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EmailHandler {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  Events  $event
	 * @return void
	 */
	public function handle(User $user,$remember)
	{
		$GLOBALS['email'] = $user->email;
		$data=array('username'=>$user->name);

		Mail::send('emailview',$data , function($message)
		{
		$message->to($GLOBALS['email'], 'Divyank')->subject('Welcome to Divyank.com!');
		});
	}

}
