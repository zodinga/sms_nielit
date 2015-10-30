<?php
class Settings_Controller extends Base_Controller {

	public $restful = true;
	public function get_index()
	{
		$sett=Settings::all();
		//var_dump($settings); exit();
        return View::make('admin.settings.index')
        ->with('settings',$sett)
        ->with('error_code',0);
	}

	public function post_update()
	{
      $update_settings = Settings::find(Input::get('id'));
      
      //echo "Radio:",Input::get('optionsRadios');exit();
      $update_settings->editstudent=Input::get('optionsRadios');
      $update_settings->delete_student=Input::get('optionsDelete');

      $update_settings->save();
      return View::make('admin.settings.index')
      ->with('settings',Settings::all())
      ->with('error_code',0);
	}

}
?>