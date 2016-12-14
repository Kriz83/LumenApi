<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Tasks;

class TasksController extends Controller
{
	
//showing a task list
    public function index()
    {
		
		$result = Tasks::orderBy('day' , 'ASC')->simplePaginate(5);
		
		return view('tasks' , compact('result'));
    }
	
	//showing tasks from concrete day	
	public function showDayTask(Request $request, $day)
    {

	  $result = Tasks::orderBy('day' , 'ASC')->where('day' , $day)->simplePaginate(5);
		
       	return view('tasks' , compact('result' , 'day'));
    }
	
//adding new task to database
	 public function addTask(Request $request)
    {
		//use current dateTime and concatenation of send data to pass it to database
		$date = date('Y-m-d');

		$insert = new Tasks;
		$insert['day'] = $request->day;
		$insert['topic'] = $request->topic;
		$insert['adddate'] = $date;
		$insert['todo'] = 1;
		$insert->save();
		
		$day = $request->day;
		
		$result = Tasks::orderBy('day' , 'ASC')->where('day' , $day)->simplePaginate(5);

		return view('tasks' , compact('result' , 'day'));
		
    }
	
//shows tasks from range	
	 public function showSelectedTasks(Request $request)
    {
		//use concatenation of send data to pass it to database
		$date1 = $request->year.'-'.$request->month.'-'.$request->day;
		$date2 = $request->year2.'-'.$request->month2.'-'.$request->day2;
		
		$result = Tasks::orderBy('day' , 'ASC')->whereBetween('day' , array($date1, $date2))->simplePaginate(20);
		
		return view('tasks' , compact('result'));
       	
	
    }
	
//changing task status	
	 public function changeTask(Request $request, $id)
    {
        $result =  Tasks::find($id);
		$type = $result['todo'];
		//foreach result to change a type of task from to do to accomplished
		
		if ($type == 1) {
			$type = 0;
		} else {
			$type = 1;
		}
		
		$result['todo'] = $type;
		$result->save();
		
       	$result = Tasks::orderBy('day' , 'ASC')->simplePaginate(5);
		
       	return view('tasks' , compact('result'));
    }
	
//deleting task
	 public function deleteTask(Request $request, $id)
    {
		
		$result =  Tasks::find($id);
		
		$result->delete();
		
       	return new RedirectResponse('\tasks');
    }
	
}
