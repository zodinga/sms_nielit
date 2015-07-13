<?php
class Courses extends Eloquent 
    {
    	 public function type()
		     {
		          return $this->has_many('types','id','courses');
		      }
    	
    }
?>