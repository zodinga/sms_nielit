<?php
class Gallery_Controller extends Base_Controller {

	public function action_index()
	{
        return View::make('home.gallery')
        	->with('error_code',0);
	}

}
?>