<?php
class Save_course_Controller extends Base_Controller {

	public function action_index()
	{
      $update_course = new Courses;
      $update_course->course=Input::get('course');
      $update_course->full_form=Input::get('full_form');
      $update_course->type_id=Input::get('type_id');
      $update_course->semester=Input::get('semester');
      $update_course->duration=Input::get('duration');
      $update_course->save();
      return View::make('admin.course_display');
	}


}

?>