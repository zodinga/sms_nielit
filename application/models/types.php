<?php
class Types extends Eloquent 
    {
    	    public function courses(){
    	    	return $this->belongs_to('Courses');
    	    }
    }
?>