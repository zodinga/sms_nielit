<?php
class Students extends Eloquent 
    {
    	public function courses()
		{
		  return $this->has_many_and_belongs_to('courses', 'types');
		}
    }
?>