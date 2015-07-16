<?php
class Courses_Controller extends Base_Controller {

	public $restful = true;
	public function get_index()
	{
		
		return View::make('admin.course.index')->with('cours',Courses::order_by('id')->get());;
	}
	public function get_add()
	{
		return View::make('admin.course.form');
	}
}

?>