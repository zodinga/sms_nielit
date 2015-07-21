<?php
class Types_Controller extends Base_Controller {

	public $restful = true;
	public function get_index()
	{
		return View::make('admin.type.index')
		->with('types',Types::order_by('id')->get())
		->with('error_code',0);
	}

	public function get_add()
	{
		return View::make('admin.type.form1')->with('error_code',0);
	}

	public function post_save()
	{
      $update_type = new Types;
      $update_type->type=Input::get('type');
      $update_type->save();
      return View::make('admin.type.index')
      ->with('types',Types::order_by('id')->get())
      ->with('error_code',0);
	}

	public function post_update()
	{
      $update_type = Types::find(Input::get('id'));
      
      $update_type->type=Input::get('type');
      $update_type->save();
      return View::make('admin.type.index')
      ->with('types',Types::order_by('id')->get())
      ->with('error_code',0);
	}

	public function get_delete($id)
	{
		$delete_type=Types::find($id);
		//echo Input::get('id');
		$delete_type->delete();

		/*return View::make('admin.type.index')
		->with('types',Types::order_by('id')->get())
		->with('error_code',0);*/

		return Redirect::to('types/index')->with('types',Types::order_by('id')->get());

		//return Redirect::to_route('types')->with('message','The type was deleted successfully');
	}


}
?>