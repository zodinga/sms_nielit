<?php
class Courses extends Eloquent 
    {
    	 public function types(){
    	 	return $this->has_one('Type');
    	 }

    }
?>