<?php
class Existing_course_Controller extends Base_Controller {

	public function action_index()
	{
		return View::make('admin.course_display');
	}
}