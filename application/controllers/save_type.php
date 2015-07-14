<?php
class Save_type_Controller extends Base_Controller {

	public function action_index()
	{
      $update_type = new Types;
      $update_type->type=Input::get('type');
      $update_type->save();
      return View::make('admin.type_display');
	}


}