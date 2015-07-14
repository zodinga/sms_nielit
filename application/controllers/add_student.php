<?php
class Add_student_Controller extends Base_Controller {

	public function action_index()
	{
      return View::make('admin.student_form');
	}
}