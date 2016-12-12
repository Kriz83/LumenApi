<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class WorkController extends Controller
{
	
//shows all work days
    public function index()
    {
        $result = \DB::select('SELECT * FROM work');
		return view('work' , compact('result'));
    }
	
//adding a new work or holiday day
	 public function addWork(Request $request)
    {
//add a 0 to request day to proper comparsion
		if ($request->day < 10) {
			$request->day = '0'.$request->day;
		}
//concatenation of date
       	$todoDate = $request->year.'-'.$request->month.'-'.$request->day;
		
		$result = \DB::select('SELECT * FROM work');
		foreach ($result as $row) {
			$day = ''.$row->day;
//if date exists in database - redirect
			if (strcmp($day, $todoDate) === 0) {
				return new RedirectResponse('\work');
			}
		}

//if date isn't allready in database, add to database
		$insert = \DB::insert(
			'insert into work (day, type) values (?, ?)', [$todoDate, $request->workType]
		);
		return new RedirectResponse('\work');
		
    }
	
//changing a type of day
	public function changeWork(Request $request, $id)
    {
		$result = \DB::select('SELECT * FROM work WHERE id = ?' , [$id]);
		foreach ($result as $row) {
			$type = $row->type;
		}
		
		if ($type == 'Praca') {
			$type = 'Urlop';
		} else {
			$type = 'Praca';
		}
		
		$insert = \DB::update(
			'UPDATE work SET type = ? WHERE id = ?', [$type, $id]
		);
		
       	return new RedirectResponse('\work');
    }

//shows work from range	
	 public function showSelectedWork(Request $request)
    {
		$date1 = $request->year.'-'.$request->month.'-'.$request->day;
		$date2 = $request->year2.'-'.$request->month2.'-'.$request->day2;
		
		$result = \DB::select(
			'SELECT * FROM work WHERE day BETWEEN ? AND ?' , 
			[$date1, $date2]
		);

		
       	return view('\work' , compact('result'));
	
    }
	
}
	