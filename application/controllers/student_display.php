<?php
class Student_display_Controller extends Base_Controller {

	public function action_index()
	{
		return View::make('admin.student_display');
	}
}