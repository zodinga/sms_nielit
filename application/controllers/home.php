<?php
class Home_Controller extends Base_Controller {

	

	public function action_index()
	{
        return View::make('home.index')->with('error_code',0);
	}

	public function action_about()
	{
        return View::make('home.about')->with('error_code',0);
	}

}
?>