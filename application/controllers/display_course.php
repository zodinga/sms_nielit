<?php
class Display_course_Controller extends Base_Controller {

	public function action_index()
	{
		
		return View::make('admin.display_course')->with('cours',Courses::order_by('id')->get());
	}
}