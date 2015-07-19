<?php
class Yearly_record_Controller extends Base_Controller {

	public $restful = true;
	public function get_index()
	{
		return View::make('admin.type.index')
		->with('types',Types::order_by('id')->get());
	}

	


}
?>