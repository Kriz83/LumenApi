

@extends('layout')



@section('content')

	
	    <div class="container">
			  <!-- Static navbar -->
			  <nav class="navbar navbar-default">
				<div class="container-fluid">
				  <div class="navbar-header">
					<a class="navbar-brand" href="/">My First Api</a>
				  </div>
				  <div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
					  <li class="active"><a href="/workDays">Work days</a></li>
					  <li><a href="/tasks">All tasks</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
					  
					  <li><a href="">About</a></li>
					  
					</ul>
				  </div><!--/.nav-collapse -->
				</div><!--/.container-fluid -->
			  </nav>
			</div>
			
			@if (empty($result))
				<div class="container">
					<hr>
					<h2>There are no work days added</h2>
					<hr>
				</div>
			@else
				<div class="container">
				@if (isset($error) && $error == true)
					<b>Day of Work allready exists, add diffrent date</b>
				@endif
				</div>
				<div class="container">
					Show from:<br/>
					<form method="POST" action="/workDays/selectedWorkDays">
						<input type="number" name="day" min="1" max="31" value="1" />
						<input type="number" name="month" min="1" max="12" value="12"/>
						<input type="number" name="year" min="1900" max="2100" value="2016"/><br/>
						Show to:<br/>

						<input type="number" name="day2" min="1" max="31" value="30"/>
						<input type="number" name="month2" min="1" max="12" value="12"/>
						<input type="number" name="year2" min="1900" max="2100" value="2016"/><br/><br/>
						<button type="submit" class="btn btn-primary"> Change search values</button><br/><br/>
					</form>
				</div>
			
			<div class="container">
				<table class="table">
					<tr>
						<th>Day</th>
						<th>Availability</th>
						<th>Change availability</th>
						<th>Tasks</th>
					
					</tr>
					@foreach ($result->all() as $value)
					<tr>
						<td>{{$value->day}}</td>
						<td>{{$value->type}}</td>
						<td>
							<form method="GET" action='/workDays/changeWorkDay/{{$value->id}}'>
								<div class="form-group">
									<button type="submit" class="btn btn-primary">Change</button>
								</div>
							</form>
						</td>
						<td><a href='/tasks/{{$value->day}}/showDayTask'>Tasks from day <b>{{$value->day}}</b>
						</a></td>
					@endforeach
				</table>
				
				{{ $result->links() }}
			
			</div>
			<br/><hr><br/>
			@endif
			
			<div class="container">
			
				<form method="POST" action="/workDays/addWorkDay">
				<h2>Add work days</h2>
					<div class="form-group">	
						<b>Availability date:</b>
						<input type="number" name="day" min="1" max="31" value="1" />
						<input type="number" name="month" min="1" max="12" value="12"/>
						<input type="number" name="year" min="1900" max="2100" value="2016"/><br/>
					</div>
					<div class="form-group">	
						<label><input type="radio" name="workType" value="Work" checked> Work</input></label><br/>
						<label><input type="radio" name="workType" value="Holiday"> Holiday</input></label><br>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Send</input>
					</div>
				</form>

			</div>

@stop
