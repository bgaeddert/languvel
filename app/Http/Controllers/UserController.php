<?php namespace App\Http\Controllers;

class UserController extends Controller {


	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        return \Response::json(\App\User::findOrFail(1));
	}

    public function postTest(){
        return \Response::json(\App\User::findOrFail(1));
    }

}
