<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\WorkDays;

class WorkDaysController extends Controller
{
	
//shows all workDays days
    public function index()
    {
        $result = WorkDays::simplePaginate(5);
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
		
		return new RedirectResponse('\workDays');
		
    }
	
//changing a type of day
	public function changeWork(Request $request, $id)
    {
		$result = \DB::table('workDays')->where('id', $id)->select('type')->get();
		foreach($result as $row){
			$type = $row->type;
		}
	
		if ($type == 'Praca') {
			$type = 'Urlop';
		} else {
			$type = 'Praca';
		}
	
		$insert = \DB::table('workDays')->where('id', $id)->update(array('type' => $type));
	
       	return new RedirectResponse('\workDays');
    }

//shows workDays from range	
	 public function showSelectedWork(Request $request)
    {
		$date1 = $request->year.'-'.$request->month.'-'.$request->day;
		$date2 = $request->year2.'-'.$request->month2.'-'.$request->day2;
		
		$result = \DB::table('workDays')->whereBetween('day' , array($date1, $date2))->orderby('day')->paginate(10);

		
       	return view('\workDays' , compact('result'));
	
    }
	
}
	