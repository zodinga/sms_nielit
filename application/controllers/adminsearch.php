<?php
class Adminsearch_Controller extends Base_Controller {

	public function action_index()
	{
		$searchtxt = "%".Input::get('searchtxt')."%";
		$course = Input::get('course');
		if($course == "all")
		{
			$result = studentformats::where('name','LIKE',$searchtxt)->get();
		}
		else
		{
			$result = studentformats::where('name','LIKE',$searchtxt)->where('course','=',$course)->get();	
		}
        return View::make('admin.searchResult')
        	->with('result',$result);
	}

}
?>