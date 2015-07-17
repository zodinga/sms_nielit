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
		}
		else
		{
			$result = students::where('name','LIKE',$searchtxt)->where('course','=',$course)->get();	
			//var_dump($result);exit();
		}
        return View::make('admin.searchResult')
        	->with('result',$result);
	}

}
?>