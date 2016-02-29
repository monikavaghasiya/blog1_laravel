<?php namespace App\Http\Controllers;
use Mail;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$GLOBALS['email'] = 'monika.vaghasiya94@gmail.com';
		$data=array('username'=>'bhbytvrfcvtgrswqsdew');

		Mail::send('emailview',$data , function($message)
		{
			$message->to($GLOBALS['email'], 'monika')->subject('Welcome to Monika.com!');
		});


		return view('auth.login');
	}

}
