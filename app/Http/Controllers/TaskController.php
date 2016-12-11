<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
//showing a task list
    public function index()
    {
		$result = \DB::select('SELECT * FROM tasks ORDER BY day');
		return view('task' , compact('result'));
    }
//showing tasks from concrete day	
	public function showDayTask(Request $request, $id)
    {
		$result = \DB::select('SELECT * FROM work WHERE id = ?' , [$id]);
		foreach ($result as $row) {
			$day = $row->day;
		}
		
	  $result = \DB::select('SELECT * FROM tasks WHERE day = ?' , [$day]);
		
       	return view('\task' , compact('result'));
    }
   
}