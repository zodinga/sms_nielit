<?php
	/**
	* 
	*/
	class Students_Controller extends Base_Controller
	{
		public $restful = true;
		public function get_index()
		{
			# code...
			
			return View::make('admin.student.index');
		}

		public function get_add()
		{
			# code...
			return View::make('admin.student.form');
		}

		public function get_view($id){
			
			return View::make('admin.student.view')->with('id',$id);
		}

		public function post_save()
		{
			# code...
			$update_student = new Students;

				$update_student->name=Input::get('name');
				$update_student->aadhaar=Input::get('aadhaar');
				$update_student->eid=Input::get('eid');
				$update_student->phone=Input::get('phone');
				$update_student->email=Input::get('email');
				$update_student->inst_no=Input::get('inst_no');
				$update_student->univ_reg_no=Input::get('univ_reg_no');
				$update_student->exam_roll_no=Input::get('exam_roll_no');
				$update_student->doj=Input::get('doj');
				$update_student->course=Input::get('course');
				$update_student->batch=Input::get('batch');
				$update_student->fathers_me=Input::get('fathers_me');
				$update_student->mothers_me=Input::get('mothers_me');
				$update_student->parents_phone=Input::get('parents_phone');
				$update_student->guardian_me=Input::get('guardian_me');
				$update_student->guardian_phone=Input::get('guardian_phone');
				$update_student->dob=Input::get('dob');
				$update_student->sex=Input::get('sex');
				$update_student->category=Input::get('category');
				$update_student->community=Input::get('community');
				$update_student->per_street=Input::get('per_street');
				$update_student->per_city=Input::get('per_city');
				$update_student->per_district=Input::get('per_district');
				$update_student->per_state=Input::get('per_state');
				$update_student->per_pin=Input::get('per_pin');
				$update_student->pre_street=Input::get('pre_street');
				$update_student->pre_city=Input::get('pre_city');
				$update_student->pre_district=Input::get('pre_district');
				$update_student->pre_state=Input::get('pre_state');
				$update_student->pre_pin=Input::get('pre_pin');
				$update_student->status=Input::get('status');
				$update_student->photo=Input::get('photo');

      		$update_student->save();
      		
			return View::make('admin.student.index');
		}

		public function post_update()
		{
			# code...
			$update_student = Students::find(Input::get('id'));

				$update_student->name=Input::get('name');
				$update_student->aadhaar=Input::get('aadhaar');
				$update_student->eid=Input::get('eid');
				$update_student->phone=Input::get('phone');
				$update_student->email=Input::get('email');
				$update_student->inst_no=Input::get('inst_no');
				$update_student->univ_reg_no=Input::get('univ_reg_no');
				$update_student->exam_roll_no=Input::get('exam_roll_no');
				$update_student->doj=Input::get('doj');
				$update_student->course=Input::get('course');
				$update_student->batch=Input::get('batch');
				$update_student->fathers_me=Input::get('fathers_me');
				$update_student->mothers_me=Input::get('mothers_me');
				$update_student->parents_phone=Input::get('parents_phone');
				$update_student->guardian_me=Input::get('guardian_me');
				$update_student->guardian_phone=Input::get('guardian_phone');
				$update_student->dob=Input::get('dob');
				$update_student->sex=Input::get('sex');
				$update_student->category=Input::get('category');
				$update_student->community=Input::get('community');
				$update_student->per_street=Input::get('per_street');
				$update_student->per_city=Input::get('per_city');
				$update_student->per_district=Input::get('per_district');
				$update_student->per_state=Input::get('per_state');
				$update_student->per_pin=Input::get('per_pin');
				$update_student->pre_street=Input::get('pre_street');
				$update_student->pre_city=Input::get('pre_city');
				$update_student->pre_district=Input::get('pre_district');
				$update_student->pre_state=Input::get('pre_state');
				$update_student->pre_pin=Input::get('pre_pin');
				$update_student->status=Input::get('status');
				$update_student->photo=Input::get('photo');

      		$update_student->save();
      		
			return View::make('admin.student.index');
		}
	}
?>