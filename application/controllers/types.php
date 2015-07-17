<?php
class Types_Controller extends Base_Controller {

	public $restful = true;
	public function get_index()
	{
		return View::make('admin.type.index')->with('types',Types::order_by('id')->get());
	}

	public function get_add()
	{
		return View::make('admin.type.form1');
	}

	public function post_save()
	{
      $update_type = new Types;
      $update_type->type=Input::get('type');
      $update_type->save();
      return View::make('admin.type.index')->with('types',Types::order_by('id')->get());
	}

	public function post_update()
	{
      $update_type = Types::find(Input::get('id'));
      
      $update_type->type=Input::get('type');
      $update_type->save();
      return View::make('admin.type.index')->with('types',Types::order_by('id')->get());
	}


}
?>