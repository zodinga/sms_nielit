<?php
	class Status_Update_Controller extends Base_Controller
	{
		//public $restful = true;
		public function action_update()
		{
			$students = Students::all();
			$cy=date("Y");
			$cy=(int)$cy;
			//echo gettype($cy);
			foreach ($students as $s)
			{
				$y=$s->doj;
				$y=(int)$y;

				if($s->status==1)
				{
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
							

							//echo "Name:$s->name, Course:$course->course, Duration:$course->duration, Starting date:".date_format($sd,"Y/m/d").", Months spend:".$m;
							if($m>$course->duration)
							{
								$over=(int)$m-$course->duration;
								echo "Name:$s->name has completed his/her course, months expired by:$over<br>";
								$s->status=2;
								$s->save();
								echo "Saved";
							}
						}
					}
				}
			}
			return View::make('admin.index')
				->with('error_code',0);
		}
}
?>