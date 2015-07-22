<?php
class Signin_Controller extends Base_Controller {
	public function action_index()
	{
        return View::make('home.login');
	}

}
?>