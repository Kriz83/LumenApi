<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\WorkDays;

class WorkDaysController extends Controller
{
	
//shows all workDays days
    public function index()
    {
		
        $result = WorkDays::orderBy('day' , 'ASC')->simplePaginate(5);
		return view('workDays' , compact('result'));
		
    }
	
//adding a new workDays or holiday day
	 public function addWorkDay(Request $request)
    {
		
	//add a 0 to request day to proper comparsion
		if ($request->day < 10) {
			
			$request->day = '0'.$request->day;
			
		}
	//concatenation of date

       	$todoDate = $request->year.'-'.$request->month.'-'.$request->day;
		
		$result = WorkDays::all();

		foreach ($result as $row) {
			
			$day = ''.$row->day;
		//if date exists in database - redirect
			if (strcmp($day, $todoDate) === 0) {
				
				$result = WorkDays::simplePaginate(5);
				$error = true;
				
				return view('workDays' , compact('result' , 'error'));
				
			}
		}

	//if date isn't allready in database, add to database
		$insert = new WorkDays;
		$insert['day'] = $todoDate;
		$insert['type'] = $request->workType;
		$insert->save();
		
		$result = WorkDays::simplePaginate(5);
		
		return view('\workDays' , compact('result' , 'error'));
		
    }
	
//changing a type of day
	public function changeWorkDay(Request $request, $id)
    {
		
		$update =  WorkDays::find($id);
		$type = $update['type'];
		
		if ($type == 'Praca') {
			$type = 'Urlop';
		} else {
			$type = 'Praca';
		}
		
	//if date isn't allready in database, add to database
		$update['type'] = $type;
		$update->save();
		
		return new RedirectResponse('\workDays');
		
    }

//shows workDays from range	
	 public function selectedWorkDays(Request $request)
    {
		
		$date1 = $request->year.'-'.$request->month.'-'.$request->day;
		$date2 = $request->year2.'-'.$request->month2.'-'.$request->day2;
		
		$result = WorkDays::whereBetween('day' , array($date1, $date2))->simplePaginate(5);
		
		
       	return view('\selectedWorkDays' , compact('result'));
	
    }
	
}//WorkDaysController end
	