<?php
	/**
	* 
	*/
	class Studentformats_Controller extends Base_Controller
	{
		public $restful = true;
		public function get_index()
		{
			# code...
			return View::make('admin.student.index');
		}

		public function get_add()
		{
			# code...
			return View::make('admin.student.form');
		}

		public function get_save()
		{
			# code...
			
			return View::make('admin.student.index');
		}
	}
?>