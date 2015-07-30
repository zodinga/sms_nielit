<?php
class Test_Controller extends Base_Controller {

	public function action_index()
	{

        return View::make('home.test')
        	->with('error_code',0);
	}
	public function action_upload()
	{
		$ty=Input::file('paper.size');
		
		//exit();
		//$bytes = File::size($ty);

		echo "size=".$ty/1024;
		exit();
		$extension = File::extension($ty);
		echo "Extension=".$extension;
		if($extension=="docx"||$extension=="doc"||$extension=="pdf")
		{
				$filename = Str::random(5).'.'. File::extension(Input::file('paper.name'));
				Input::upload('paper', 'public/uploads/paper', $filename);
				return View::make('home')
		        	->with('error_code',0);
        }
        else
        {
        		return View::make('home')
		        	->with('error_code',1);
        }
	}


}
?>