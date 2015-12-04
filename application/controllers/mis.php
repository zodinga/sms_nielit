<?php

class Mis_Controller extends Base_Controller {


	public function action_index()
	{
		$head="MIS REPORT";
		return View::make('home.mis')
			->with('heading',$head)
			->with('error_code',0);
	}

	public function action_yearly_report()
	{
		
		$year=Input::get('year');
		$course_id=Input::get('courseID');
		echo $year;
		echo $course_id;
		$course=Courses::find($course_id);
		$duration=$course->duration;
		$span=$duration/12;
		$begin=($year-$span)+1;
		echo "\nBegin:",$begin;

		$students=Students::where('doj','>=',$begin)
							->where('doj','<=',$year)
							->where('course','=',$course_id)
							->order_by('doj','desc')
							->order_by('name','asc')
							->get();

		$count=Students::where('doj','>=',$begin)
							->where('doj','<=',$year)
							->where('course','=',$course_id)
							->order_by('doj','asc')
							->order_by('name','asc')
							->count();
		$male=Students::where('doj','>=',$begin)
							->where('doj','<=',$year)
							->where('course','=',$course_id)
							->where('sex','=','m')
							->count();
		$female=Students::where('doj','>=',$begin)
							->where('doj','<=',$year)
							->where('course','=',$course_id)
							->where('sex','=','f')
							->count();
		$head="MIS REPORT: TOTAL ".$count." MALE=".$male." FEMALE=".$female;
		return View::make('home.mis_report')
					->with('students',$students)
					->with('error_code',0)
					->with('heading',$head)
					->with('yr',$year);

                        
	}

}