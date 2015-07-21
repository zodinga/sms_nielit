<?php
class Users_Controller extends Base_Controller {

	public $restful = true;
	public function get_index()
	{
		return View::make('');
	}

	public function post_signin()
	{
		$input = Input::all(); // It retrieves all submitted data.
		if($input != null) // If we submitted something from the form
		        {
		        $credentials = array('username'=>Input::get('username'),'password'=>Input::get('password'));
		        if(Auth::attempt($credentials))
		            {
		                Session::put('username',Input::get('username'));
						$uname = Session::get('username');
						if(Auth::user()->type == 1)
						{
						return View::make('admin.index')
		                        ->with('error_code',2)
		                        ->with('username',$uname);
						}
						elseif(Auth::user()->type == 2)
						{
							return View::make('faculty.index')
		                        ->with('error_code',2)
		                        ->with('username',$uname);
						}
						elseif (Auth::user()->type == 3) {
							return View::make('user.index')
		                        ->with('error_code',2)
		                        ->with('username',$uname);
						}
		            }

		        return View::make('home.index')->with('error_code',1);
		        }
		else
		        return View::make('home.index')->with('error_code',1);
	}

	public function get_signup()
	{
		return View::make('signup.index');
	}

	public function post_save()
	{
		/*echo Input::get('username');
		echo Input::get('password');exit();*/
      if(Input::get('password')!=Input::get('repassword'))
      	{
      		return View::make('home.index')->with('error_code',1);
      	}
      $update_user = new Users;
      $update_user->username=Input::get('username');
      $update_user->password=Hash::make(Input::get('password'));
      $update_user->type=3;

      $update_user->save();
      return View::make('home.index')->with('error_code',0);
	}

	public function post_update()
	{
      $update_type = Types::find(Input::get('id'));
      
      $update_type->type=Input::get('type');
      $update_type->save();
      return View::make('admin.type.index')->with('types',Types::order_by('id')->get());
	}

	public function get_delete($id)
	{
		$delete_type=Types::find($id);
		//echo Input::get('id');
		$delete_type->delete();

		return View::make('admin.type.index')->with('types',Types::order_by('id')->get());
		//return Redirect::to_route('types')->with('message','The type was deleted successfully');
	}


}
?>