<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
	
//showing a task list
    public function index()
    {
		return view('task' , compact('result'));
    }
	
//showing tasks from concrete day	
	public function showDayTask(Request $request, $day, $id)
    {

	  $result = \DB::select('SELECT * FROM tasks WHERE day = ?' , [$day]);
		
       	return view('task' , compact('result' , 'day'));
    }
	
//adding new task to database
	 public function addTask(Request $request)
    {
		$presentDate = date('Y-m-d');
		$day = $request->day;
		$topic = $request->topic;
		
		$insert = \DB::insert(
			'insert into tasks (day, topic, adddate, todo) values (?, ?, ?, ?)', [$day, $topic, $presentDate, 1]
		);
		
		$result = \DB::select('SELECT * FROM tasks WHERE day = ? ORDER BY day' , [$day]);

		return view('\task' , compact('result' , 'day'));
    }
	
	//changing task status	
	 public function changeTask(Request $request, $id)
    {
        $result = \DB::select('SELECT * FROM tasks WHERE id = ?' , [$id]);
		foreach ($result as $row) {
			$type = $row->todo;
			$day = $row->day;
		}
		
		if ($type == 1) {
			$type = 0;
		} else {
			$type = 1;
		}
		
		$insert = \DB::update(
			'UPDATE tasks SET todo = ? WHERE id = ?', [$type, $id]
		);
		
		$result = \DB::select('SELECT * FROM tasks WHERE day = ?' , [$day]);
		
       	return view('\task' , compact('result' , 'day'));
    }
	
   
}