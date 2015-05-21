<?php
class Search_Controller extends Base_Controller {

	public function action_index()
	{
		$input = Input::all();
		echo Input::get('$searchText');exit();
        return View::make('home.searchResult')
        	->with('name',Input::get('$searchText'))
        	->with('course',Input::get('$course'));
	}

}
?>