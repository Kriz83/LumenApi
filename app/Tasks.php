<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
	
	protected $fillable = array('day' ,'topic' , 'adddate' , 'todo');
	
	protected $table = 'tasks';
	
	public function work()
	{
		
		return $this->belongsTo(WorkDays::class);
		
	}
	
	
	
}