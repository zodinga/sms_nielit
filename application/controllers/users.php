<?php
class Users_Controller extends Base_Controller {

	public $restful = true;
	public function get_index()
	{
					$users=Users::all();
					return View::make('admin.user.index')
						->with('users',$users)
						->with('error_code',0)
						->with('heading',"Users");
	}

	public function get_add()
	{
		return View::make('admin.user.form')->with('error_code',0);
	}
	public function post_save()
	{
		$update_course=new Courses;

		$update_course->course=Input::get('course');
		$update_course->full_form=Input::get('full_form');
		$update_course->type_id=Input::get('type_id');
		$update_course->semester=Input::get('semester');
		$update_course->duration=Input::get('duration');

		$update_course->save();

		return Redirect::to('courses/index')->with('cours',Courses::order_by('id')->get());
	}
	public function post_update()
	{
		$user=Users::find(Input::get('id'));

		$user->username=Input::get('username');
		$user->type=Input::get('type');
		

		$user->save();

		return Redirect::to('users/index')->with('users',Users::order_by('id')->get());
	}
	public function get_delete($id)
	{
		// $id=Input::get('id');
		// echo "ID=",$id; exit();
		$user=Users::find($id);
		
		$user->delete();

		//return View::make('admin.course.index')->with('cours',Courses::order_by('id')->get());	
		return Redirect::to('users/index')->with('users',Users::order_by('id','DESC')->get());
	}
}

?>