<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkDays extends Model
{
	
	protected $fillable = array('day' , 'type');
	
	public function task()
	{
		
		return $this->hasMany(Task::class);
		
	}
	
	
	
}