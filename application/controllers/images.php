<?php
class Images_Controller extends Base_Controller 
{
	public function action_index()
	{
        return View::make('home.imageupload')
        				->with('error_code',0);
	}
public function action_upload()
	{
		//dd(Input::get('id')); exit();
		$id=Input::get('id');
       	$rules = array(
            'image' => 'image',
        );
        $validation = Validator::make(Input::file('photo'), $rules);
        // create random filename
        if($validation->passes())
		{
			$filename = Str::random(5) .'.'. File::extension(Input::file('photo.name'));
			// Save logo in the database
			$event = Students::where('id', '=', $id)->first();
			$event->photo = $filename;
			$event->save();
			
			// start bundle 'resizer'
			//Bundle::start('resizer');
			// resize image		
			//$img = Input::file('photo');
			
			//$success = Resizer::open($img)
						//->resize(60 , 30 , 'auto' )
						//->save('public/uploads/thumbnails/'.$filename , 90 );
			// move uploaded file to public/uploads
			Input::upload('photo', 'public/uploads', $filename);
		}
		else
			echo "Upload unsuccessful";


//------------------------------------------
        /*$file            = Input::file('file');
        $destinationPath = 'public/img';
        //var_dump($file);exit();
        Input::upload('file', $destinationPath, 'test.jpg');*/
//------------------------------------------
    	return View::make('home');
    }
    //}

	

}
?>