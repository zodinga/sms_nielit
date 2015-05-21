<?php
class Contact_Controller extends Base_Controller {

	public function action_index()
	{
        return View::make('home.contact');
	}

}
?>