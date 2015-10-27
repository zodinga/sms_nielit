// <?php
// class Adminsearch_Controller extends Base_Controller {

// public $restful = true;
// 	public function post_index()
// 	{
// 		$searchtxt = "%".Input::get('searchtxt')."%";
// 		$course = Input::get('course');
// 		//echo "Searchtext=",$searchtxt;
// 		//echo "Course=",$course;

// 		if($course == "all")
// 		{
// 			$result = Students::where('name','LIKE',$searchtxt)->get();
// 			//var_dump($result);exit();
// 			//echo $result->name;
// 			$scourse=Input::get('course');
// 		}
// 		else
// 		{
// 			$result = Students::where('name','LIKE',$searchtxt)->where('course','=',$course)->get();	
// 			//var_dump($result);exit();
// 		$scour=Courses::find($course);
// 		$scourse=$scour->course;
// 		}
// 		//var_dump($result);
// 		//echo "DDDD Result" , $result->id;

//         return View::make('admin.searchResult')
//         	->with('result',$result)
//         	->with('stxt',Input::get('searchtxt'))
//         	->with('scourse',$scourse);
// 	}

// }
// ?>