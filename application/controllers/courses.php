<?php
class Courses_Controller extends Base_Controller {

	public $restful = true;
	public function get_index()
	{
		if(Auth::check())
				{
					$cours=Courses::where('id','>','0')->paginate(10);
					return View::make('admin.course.index')
						->with('cours',$cours->results)
						->with('links',$cours->links())
						->with('error_code',0);
				}
				else
				{
					$cours=Courses::where('id','>','0')->paginate(10);
					return View::make('home.courses')
						->with('cours',$cours->results)
						->with('links',$cours->links())
						->with('error_code',0);
				}


	}

	public function get_add()
	{
		return View::make('admin.course.form')->with('error_code',0);
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
		$update_course=Courses::find(Input::get('id'));

		$update_course->course=Input::get('course');
		$update_course->full_form=Input::get('full_form');
		$update_course->type_id=Input::get('type_id');
		$update_course->semester=Input::get('semester');
		$update_course->duration=Input::get('duration');

		$update_course->save();

		return Redirect::to('courses/index')->with('cours',Courses::order_by('id')->get());
	}
	public function get_delete($id)
	{
		// $id=Input::get('id');
		// echo "ID=",$id; exit();
		$delete_course=Courses::find($id);
		
		$delete_course->delete();

		//return View::make('admin.course.index')->with('cours',Courses::order_by('id')->get());	
		return Redirect::to('courses/index')->with('cours',Courses::order_by('id','DESC')->get());
	}
}

?>