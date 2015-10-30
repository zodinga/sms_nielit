<?php
	class Status_Update_Controller extends Base_Controller
	{
		//public $restful = true;
		public function action_index()
		{
			return View::make('admin.student.status_update')
				->with('error_code',0);
		}

		public function action_update()
		{
			$students = Students::where('status','=',1)->order_by('doj','desc')->get();
			$cy=date("Y");
			$cy=(int)$cy;
			//echo gettype($cy);
			foreach ($students as $s)
			{
				$y=$s->doj;
				$y=(int)$y;

					$course=Courses::find($s->course);
					if($course!=NULL)
					{
						if($s->doj)
						{
							$doj="1-July-".$s->doj;
							$sd=date_create_from_format("j-M-Y",$doj);
							$now = new DateTime("now");
							$interval = date_diff($sd, $now);
							$m=$interval->m + ($interval->y * 12) . ' months';
							
							if($m>$course->duration)
							{
								$over=(int)$m-$course->duration;
								echo "Name:$s->name has completed his/her course, months expired by:$over<br>";
								$s->status=2;
								$s->status_update_date=$now;
								$s->save();
								echo "$s->name's Status Updated.";
							}
						}
					}
			}
			return View::make('admin.index')
				->with('error_code',0);
		}
}
?>