<?php
class Search_Controller extends Base_Controller {

	public function action_index()
	{
		$searchtxt = "%".Input::get('searchtxt')."%";
		$course = Input::get('course');
		echo "Course=",$course;

		if($course == "all")
		{
			$result = students::where('name','LIKE',$searchtxt)->get();
			$scourse=Input::get('course');
			echo "SCourse=",$scourse;
		}
		else
		{
			$result = students::where('name','LIKE',$searchtxt)->where('course','=',$course)->get();
			echo "Course=",$course;
			$scourse=Courses::find($course);	
		}

		echo "SCourse=",$scourse;
        return View::make('home.searchResult')
        	->with('result',$result)
        	->with('stxt',Input::get('searchtxt'))
        	->with('scourse',$scourse);
	}

}
?>

