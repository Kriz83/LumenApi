<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TasksController extends Controller
{
//showing a task list
    public function index()
    {
		$result = \DB::select('SELECT * FROM tasks ORDER BY day');
		return view('tasks' , compact('result'));
    }
//adding new task to database
	 public function addTask(Request $request)
    {
		$date = date('Y-m-d');
		$todoDate = $request->year.'-'.$request->month.'-'.$request->day;
		
		$insert = \DB::insert(
			'insert into tasks (day, topic, adddate, todo) values (?, ?, ?, ?)', [$todoDate, $request->topic, $date, 1]
		);
		
	return new RedirectResponse('\tasks');
    }
//shows tasks from range	
	 public function showSelectedTasks(Request $request)
    {
		$date1 = $request->year.'-'.$request->month.'-'.$request->day;
		$date2 = $request->year2.'-'.$request->month2.'-'.$request->day2;
		
		$result = \DB::select(
			'SELECT * FROM tasks WHERE day BETWEEN ? AND ?' , 
			[$date1, $date2]
		);

		
       	return view('\tasks' , compact('result'));
	
    }
//changing task status	
	 public function changeTask(Request $request, $id)
    {
        $result = \DB::select('SELECT * FROM tasks WHERE id = ?' , [$id]);
		foreach ($result as $row) {
			$type = $row->todo;
		}
		
		if ($type == 1) {
			$type = 0;
		} else {
			$type = 1;
		}
		
		$insert = \DB::update(
			'UPDATE tasks SET todo = ? WHERE id = ?', [$type, $id]
		);
		
       	return new RedirectResponse('\tasks');
    }
}