<?php
	class Students_Controller extends Base_Controller
	{
		public $restful = true;
		public function get_index()
		{
			$head="All Students";
			$students = Students::where('id','>',0)->paginate(10);

			return View::make('admin.student.index')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());

		}

		public function get_add()
		{
			# code...
			return View::make('admin.student.form')->with('error_code',0);
		}

		public function get_edit($id)
		{
			# code...
			return View::make('admin.student.edit')
			->with('s',Students::find($id))
			->with('error_code',0);
		}

		public function get_searchedit($id)
		{
			# code...
			return View::make('studentedit')
			->with('s',Students::find($id))
			->with('error_code',0);
		}

		public function get_detail($id)
		{
			# code...
			return View::make('admin.student.details')
			->with('s',Students::find($id))
			->with('error_code',0);
		}

		public function get_searchdetail($id)
		{
			# code...
			return View::make('searchdetails')
			->with('s',Students::find($id))
			->with('error_code',0);
		}

		public function get_view($id){
			
			return View::make('admin.student.view')->with('id',$id);
		}

		public function get_delete($id)
		{
		$delete_student=Students::find($id);
		
		$delete_student->delete();

		return Redirect::to('students/index');
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

				$update_student->save();

				$rules = array(
            	'image' => 'image',
		        );
		        $validation = Validator::make(Input::file('photo'), $rules);
		        // create random filename
				$filename = $update_student->id.'.'. File::extension(Input::file('photo.name'));
				// Save photo in the database
				$update_student->photo = $filename;
				$update_student->save();
				//upload to uploads folder
				Input::upload('photo', 'public/uploads', $filename);

			return Redirect::to('students/index');
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

				$rules = array(
            	'image' => 'image',
		        );
		        $validation = Validator::make(Input::file('photo'), $rules);
		        // create random filename
				$filename = Input::get('sid').'.'. File::extension(Input::file('photo.name'));
				// Save photo in the database
				$update_student->photo = $filename;
				$update_student->save();
				//upload to uploads folder
				Input::upload('photo', 'public/uploads', $filename);


      		//$update_student->save();
				if(Auth::check())
				{
					return Redirect::to('students');
				}
				else
					return Redirect::to('home');
		}


	public function post_image()
		{
			$file = Input::file('image');
			$destinationPath = 'img/';
			$filename = $file->getClientOriginalName();
			Input::file('image')->move($destinationPath, $filename);
		}

	public function post_adminsearch()
		{
			$searchtxt = "%".Input::get('searchtxt')."%";
			$course = Input::get('course');

			if($course == "all")
			{
				$students = students::where('name','LIKE',$searchtxt)->get();
				$scourse=$course;
			}
			else
			{
				$students = students::where('name','LIKE',$searchtxt)->where('course','=',$course)->get();
				$scourse=Courses::find($course)->course;	
			}

	        $head="Search Result <small class='text-error'>Keywords: <u>".Input::get('searchtxt')."</u> from <u>".$scourse."</u></small>";

			return View::make('admin.student.index')
				->with('students',$students)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',"");
		}

	public function post_search()
		{
			$searchtxt = "%".Input::get('searchtxt')."%";
			$course = Input::get('course');

			if($course == "all")
			{
				$students = students::where('name','LIKE',$searchtxt)->get();
				$scourse=$course;
			}
			else
			{
				$students = students::where('name','LIKE',$searchtxt)->where('course','=',$course)->get();
				$scourse=Courses::find($course)->course;	
			}

	        $head="Search Result <small class='text-error'>Keywords: <u>".Input::get('searchtxt')."</u> from <u>".$scourse."</u></small>";
			
			$edit=Settings::find(1);

			//echo "EDIT=",$edit->editstudent;exit();
			return View::make('search')
				->with('students',$students)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',"")
				->with('editstudent',$edit->editstudent);
		}

	public function post_studentupdate()
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

				$rules = array(
            	'image' => 'image',
		        );
		        $validation = Validator::make(Input::file('photo'), $rules);
		        // create random filename
				$filename = Input::get('sid').'.'. File::extension(Input::file('photo.name'));
				// Save photo in the database
				$update_student->photo = $filename;
				$update_student->save();
				//upload to uploads folder
				Input::upload('photo', 'public/uploads', $filename);
      		

      		//$this->upload();
      		
      		
			return Redirect::to('home');
		}
		 public function upload()
		 {
		 	echo "string";
		 	/*
			 * Validate
			 */
			$rules = array(
			    'image' => 'image|max:999999'
			);
			 
			$inputs = array(
			    'image' => Input::file('image')
			);
			 
			/*$validation = Validator::make($inputs, $rules);
			 var_dump($validation->passes());exit();
			if( $validation->passes() )
			{*/
			 	

			 	echo "string2";
			    //set the name of the file
			    $filename = Input::file('image.name');
			 	//echo $filename."asdas"; exit();
			    //Upload the file
			    $c = Input::upload('image', '/img', $filename);
			 	var_dump($c);exit();
			/*}//if it validate
			else
			{
				echo "error"; exit();
			}*/
		 }

	}
?>