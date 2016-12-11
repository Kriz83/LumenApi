<?php namespace App;

class Tasks extends Eloquent
{
	
	protected $fillable = array('day' ,'topic' , 'adddate' , 'todo');
	
	protected $table = 'tasks';
	
	public function work()
	{
		
		return $this->belongsTo('Work');
		
	}
	
	
	
}