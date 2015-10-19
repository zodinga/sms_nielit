<?php
	class Students_Controller extends Base_Controller
	{
		//public $restful = true;
		public function action_index()
		{
			$head="All Students";
			$students = Students::where('id','>',0)->paginate(20);

			if(Auth::check())
			{
			return View::make('admin.student.index')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());
			}
			else
			{
				return View::make('home.displaystudent')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());
			}

		}

		public function action_current_mca()
		{
			
			$students = Students::where('course','=',4)->where('status','=',1)->paginate(20);
			$head="Current MCA Students:$students->total";
			if(Auth::check())
			{
			return View::make('admin.student.index')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());
			}
			else
			{
				return View::make('home.displaystudent')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());
			}

		}

		public function action_current_bca()
		{
			
			$students = Students::where('course','=',3)->where('status','=',1)->paginate(20);
			$head="Current BCA Students:$students->total";

			if(Auth::check())
			{
			return View::make('admin.student.index')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());
			}
			else
			{
				return View::make('home.displaystudent')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());
			}

		}

		public function action_current_dcse()
		{
			
			$students = Students::where('course','=',5)->where('status','=',1)->paginate(20);
			$head="Current DCSE Students:$students->total";

			if(Auth::check())
			{
			return View::make('admin.student.index')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());
			}
			else
			{
				return View::make('home.displaystudent')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());
			}

		}

		public function action_current_dete()
		{
			
			$students = Students::where('course','=',6)->where('status','=',1)->paginate(20);
			$head="Current DETE Students:$students->total";

			if(Auth::check())
			{
			return View::make('admin.student.index')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());
			}
			else
			{
				return View::make('home.displaystudent')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());
			}

		}

		public function action_current_o()
		{
			
			$students = Students::where('course','=',1)->where('status','=',1)->paginate(20);
			$head="Current O Level Students:$students->total";

			if(Auth::check())
			{
			return View::make('admin.student.index')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());
			}
			else
			{
				return View::make('home.displaystudent')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());
			}

		}

		public function action_current_a()
		{
			
			$students = Students::where('course','=',2)->where('status','=',1)->paginate(20);
			$head="Current A Level Students:$students->total";

			if(Auth::check())
			{
			return View::make('admin.student.index')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());
			}
			else
			{
				return View::make('home.displaystudent')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());
			}

		}

		public function action_add()
		{
			# code...
			return View::make('admin.student.form')->with('error_code',0);
		}

		public function action_edit($id)
		{
			# code...
			if(Auth::check())
				{
					return View::make('admin.student.edit')
						->with('s',Students::find($id))
						->with('error_code',0);
				}
				else
				{
					return View::make('home/studentedit')
						->with('student',Students::find($id))
						->with('error_code',0);
				}
			/*return View::make('admin.student.edit')
			->with('s',Students::find($id))
			->with('error_code',0);*/
		}

		public function action_searchedit($id)
		{
			# code...
			return View::make('home/studentedit')
			->with('s',Students::find($id))
			->with('error_code',0);
		}

		public function action_detail($id)
		{
			# code...
			if(Auth::check())
				{
					return View::make('admin.student.details')
						->with('s',Students::find($id))
						->with('error_code',0);
				}
				else
				{
					return View::make('home/displaydetails')
						->with('s',Students::find($id))
						->with('error_code',0);
				}
/*			return View::make('admin.student.details')
			->with('s',Students::find($id))
			->with('error_code',0);*/
		}

		public function action_searchdetail($id)
		{
			# code...
			return View::make('home/searchdetails')
			->with('s',Students::find($id))
			->with('error_code',0);
		}

		public function action_filter()
		{
			$course=0;
			if(Input::get('courseID')!=0)
			{
				$cour = Courses::find(Input::get('courseID'));
				$course=$cour->id;

			}
			
			$cat=Input::get('category');
			$status=Input::get('status');
			$sex=Input::get('status');
			echo "Course=$course, Category=$cat, Status=$status, Sex=$sex";
			
			$head = "Filter Result :";
			$students = Students::where('course','=',$course)
						->or_where('category','=',$cat)
						->or_where('status','=',$status)
						->or_where('sex','=',$sex)
						->paginate(20);
			
			return View::make('home.displaystudent')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());

		}

		public function action_view($id){
			
			return View::make('admin.student.view')->with('id',$id);
		}

		public function action_delete($id)
		{
		$delete_student=Students::find($id);
		
		$delete_student->delete();

		return Redirect::to('students/index');
		}

		public function action_save()
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
            	'image' => 'image|max:300',
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

		public function action_update()
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
            	'image' => 'image|max:300',
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


	public function action_image()
		{
			$file = Input::file('image');
			$destinationPath = 'img/';
			$filename = $file->getClientOriginalName();
			Input::file('image')->move($destinationPath, $filename);
		}

	public function action_adminsearch()
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

	public function action_search()
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
			return View::make('home.search')
				->with('students',$students)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',"")
				->with('editstudent',$edit->editstudent);
		}

		public function action_advancedsearch()
		{
			return View::make('admin.student.advancedsearch')
				->with('error_code',0);
		}

		public function action_advancedsearchresult()
		{
			$name=Input::get('name');
			/*if($name=="")
				$name="all"*/;
			$course=Input::get('course');
			$yoj=Input::get('yoj');
			/*if($yoj=="")
				$yoj="all";*/
			$sex=Input::get('sex');

			$category=Input::get('category');

			$community=Input::get('community');
			$status=Input::get('status');

			echo "Name=",$name;
			echo "  Course=",$course;
			echo "  Yoj=",$yoj;
			echo "  Sex=",$sex;
			echo "  Category=",$category;
			echo "  Community=",$community;
			echo "  Status=",$status;

			$head="Advanced Search Results";

			$students=DB::table('students')
								->where('name','like','%$name%')
								->where('course','=',$course)
								->where('doj','=','$yoj')
								->where('sex','like','$sex')
								->where('category','=',$category)
								->where('community','=',$community)
								->where('status','=',$status)->paginate(8);

			//$students=DB::table('students')->where_name_and_course('$name',$course)->get();

			var_dump($students);
			exit();

			
			return View::make('admin.student.index')
				->with('students',$students->results)
				->with('error_code',0)
				->with('links',$students->links())
				->with('heading',$head);
		}

	public function action_studentupdate()
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
            	'image' => 'image|max:300',
		        );
		        $validation = Validator::make(Input::file('photo'), $rules);
		        // create random filename
				if($validation->passes())
				{
				$filename = Input::get('sid').'.'. File::extension(Input::file('photo.name'));
				// Save photo in the database
				$update_student->photo = $filename;
				$update_student->save();
				//upload to uploads folder
				Input::upload('photo', 'public/uploads', $filename);
				}
				else
					echo "error";
				
      		

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

		 public function action_display($cy)
		{
			# code...
			$c=strstr($cy, "-",true);//before
			$y = substr($cy, strpos($cy, "-") + 1);    //after
			echo "Year=".$y;
			echo "Course=".$c;
			
			if($c!="all")
				$students = Students::where('doj','like',$y)->where('course','=',$c)->paginate(20);
			else
				$students = Students::where('doj','like',$y)->paginate(20);

			$head="Students:$students->total";

			if(Auth::check())
			{
			return View::make('admin.student.index')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());
			}
			else
			{
				return View::make('home.displaystudent')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());
			}
		}

		public function action_display_all($c)
		{
			# code...
			$students = Students::where('course','=',$c)->paginate(20);

			$course=Courses::find($c);
            if($course)
            $head="All $course->course Students: $students->total";

			if(Auth::check())
			{
			return View::make('admin.student.index')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());
			}
			else
			{
				return View::make('home.displaystudent')
				->with('students',$students->results)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());
			}
		}

	}
?>