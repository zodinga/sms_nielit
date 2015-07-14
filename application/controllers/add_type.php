<?php
class Add_type_Controller extends Base_Controller {

	public function action_index()
	{
      return View::make('admin.type_form');
	}
}