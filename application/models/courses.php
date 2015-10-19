<?php
class Courses extends Eloquent 
    {
    	 public static $rules=array(
    	 	'course'=>'required',
    	 	'full_form'=>'required',
    	 	'type_id'=>'required|size:2'
    	 	);

    }
?>