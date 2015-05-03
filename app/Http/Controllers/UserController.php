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
        $id = \Input::get('id');

        return \Response::json(\App\User::findOrFail($id));
	}

    public function postTest(){

        $id = \Input::get('id');

        return \Response::json(\App\User::findOrFail($id));
    }

    public function getUser($id){

        $user = \App\User::findOrFail(\Auth::user()->id);

        return view('blades.tab2', compact('user'));
    }

}
