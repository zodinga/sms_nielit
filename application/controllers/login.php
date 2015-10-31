<?php
class Login_Controller extends Base_Controller {

	

	public function action_index()
	{
            $input = Input::all(); // It retrieves all submitted data.
            if($input != null) // If we submitted something from the form
                    {
                    $credentials = array('username'=>Input::get('username'),'password'=>Input::get('password'));
                    if(Auth::attempt($credentials))
                        {
                            Session::put('username',Input::get('username'));
							$uname = Session::get('username');
							return View::make('admin.index')
                                    ->with('loginerror','3')
                                    ->with('username',$uname)
									->with('confirm',0);
                        }

                    return View::make('home.index')->with('loginerror','1');
                    }
            else
                    return View::make('home.index')->with('loginerror','2');;
	}

}
?>