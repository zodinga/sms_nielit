<?php
	class Students_Controller extends Base_Controller
	{
		//public $restful = true;
		
		public function action_index()
		{
			$head="Current Students";
			$students = Students::where('status','=',1)->order_by('course','asc')->order_by('doj','asc')->order_by('name','asc')->paginate(20);
			$students_details = Students::where('status','=',1)->order_by('course','asc')->order_by('doj','asc')->order_by('name','asc')->get();
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
				->with('students_details',$students_details)
				->with('error_code',0)
				->with('heading',$head)
				->with('links',$students->links());
			}

		}

		public function action_current_menu()
		{
			
			//$students = Students::where('course','=',4)->where('status','=',1)->paginate(20);
			$head="Current Students:";
			if(Auth::check())
			{
			return View::make('admin.student.current_menu')
				->with('error_code',0)
				->with('heading',$head);
			}
			else
			{
				return View::make('home.displaystudent')
				->with('error_code',0)
				->with('heading',$head);
			}

		}

		public function action_current_filter()
		{
			$course=Input::get('optionsCourse');
			$students = Students::where('course','=',$course)->where('status','=',1)->order_by('doj','desc')->order_by('name','asc')->get();
			$cour=Courses::find($course);
			if($cour)
			$head="Current $cour->course Students:";
			else
				$head="No Course";
			if(Auth::check())
			{
			return View::make('admin.student.current_students')
				->with('students',$students)
				->with('error_code',0)
				->with('heading',$head);
			}
			else
			{
				return View::make('home.displaystudent')
				->with('students',$students)
				->with('error_code',0)
				->with('heading',$head);
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
					  	$detail = Students::find($id);
        				$course_detail = Courses::find($detail->course);
        				$courses = Courses::all();
        				$cate = Categories::find($detail->category);
        				$categories = Categories::all();
        				$comm = Communities::find($detail->community);
        				$communities = Communities::all();
        				$sta = Statuses::find($detail->status);
        				$statuses = Statuses::all();
						return View::make('admin.student.edit')
							->with('detail',$detail)
							->with('error_code',0)
							->with('course_detail',$course_detail)
							->with('courses',$courses)
							->with('cate',$cate)
							->with('categories',$categories)
							->with('comm',$comm)
							->with('communities',$communities)
							->with('sta',$sta)
							->with('statuses',$statuses);
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
			$head = "Filter Result :";
			$student = Students::where('id','>',0)->order_by('doj','asc');

			if(Input::has('name'))
			{
				$student->where('name','like','%'.Input::get('name').'%');
				$head = $head." Name:".Input::get('name');
			}

			if(Input::has('year'))
			{
				$student->where('doj','=',Input::get('year'));
				$head = $head." Year:".Input::get('year');
			}
			
			if(Input::has('courseID'))
			{
				$student->where('course','=',Input::get('courseID'));
				$course=Courses::find(Input::get('courseID'));
            	if($course)
					$head = $head." Course:".$course->course;
			}

			if(Input::has('category'))
			{
				$student->where('category','=',Input::get('category'));
				$category=Categories::find(Input::get('category'));
            	if($category)
					$head = $head." Category:".$category->category;
			}

			if(Input::has('status'))
			{
				$student->where('status','=',Input::get('status'));
				$status=Statuses::find(Input::get('status'));
            	if($status)
					$head = $head." Status:".$status->status;
			}

			if(Input::has('sex'))
			{
				$student->where('sex','=',Input::get('sex'));
				$head = $head." Sex id:".Input::get('sex');
			}

			if(Input::has('community'))
			{
				$student->where('community','=',Input::get('community'));
				$community=Communities::find(Input::get('community'));
            	if($community)
					$head = $head." Community:".$community->community;
			}
			$students = $student->get();

			if(Auth::check())
				{
					return View::make('admin.student.index')
					->with('students',$students)
					->with('error_code',0)
					->with('heading',$head);
				}
				else
				{
					return View::make('home.displaystudent')
					->with('students',$students)
					->with('error_code',0)
					->with('heading',$head);
				}

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
				$now = new DateTime("now");
				$update_student->status_update_date=$now;

				


				if (empty($_FILES['photo']['name'])) {
    			// No file was selected for upload, your (re)action goes here
					$update_student->save();
					return Redirect::to('students/index');
				}

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
				$update_student->photo=Input::get('photo');
				if($update_student->status != Input::get('status'))
				{
					$update_student->status_update_date = date('Y-m-d');
					$update_student->status=Input::get('status');
				}

				if (empty($_FILES['photo']['name'])) {
    			// No file was selected for upload, your (re)action goes here
					$update_student->save();
					return Redirect::to('students/index');
				}

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