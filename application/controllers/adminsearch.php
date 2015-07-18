<?php
class Adminsearch_Controller extends Base_Controller {

	public function action_index()
	{
		$searchtxt = "%".Input::get('searchtxt')."%";
		$course = Input::get('course');
		if($course == "all")
		{
			$result = students::where('name','LIKE',$searchtxt)->get();
			//var_dump($result);exit();
			$scourse=Input::get('course');
		}
		else
		{
			$result = students::where('name','LIKE',$searchtxt)->where('course','=',$course)->get();	
			//var_dump($result);exit();
		$scourse=Courses::find($course);
		}

        return View::make('admin.searchResult')
        	->with('result',$result)
        	->with('stxt',Input::get('searchtxt'))
        	->with('scourse',$scourse);
	}

}
?>