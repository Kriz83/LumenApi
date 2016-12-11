<?php namespace App;

class Work extends Eloquent
{
	
	protected $fillable = array('day' , 'type');
	
	public function task()
	{
		
		return $this->hasMany('Tasks');
		
	}
	
	
	
}