<?php

class Logout_Controller extends Base_Controller {


	public function action_index()
	{
		Auth::logout();
		return View::make('home.index')
                        ->with('loginerror','2');
	}

}