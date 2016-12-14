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
					  <li><a href="/workDays">Work days</a></li>
					  <li class="active" ><a href="/tasks">All tasks</a></li>
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
					<h2>There are no task</h2>
					<hr>
				</div>
			@else
				<div class="container">
					Show from:<br/>
					<form method="POST" action="/tasks/showSelectedTasks">
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
							<th>Task</th>
							<th>Add date</th>
							<th>Status</th>
							<th>Change status</th>
							<th>Remove task</th>
						</tr>
						@foreach ($result->all() as $value)
						<tr>
							<td>{{$value->day}}</td>
							<td>{{$value->topic}}</td>
							<td>{{$value->adddate}}</td>
							<td>
							@if ($value->todo)
							Task to do
							@else
							done allready
							@endif
							</td>
							<td>
								<form method="GET" action='/tasks/changeTask/{{$value->id}}'>
							
									<div class="form-group">
										<button type="submit" class="btn btn-primary">Change</button>
									</div>
								</form>
							</td>
							<td>
								<form method="GET" action="/tasks/deleteTask/{{$value->id}}">
									<div class="form-group">
										<button type="submit" class="btn btn-primary">Remove</button>
									</div>
								</form>
							</td>
						</tr>
						@endforeach
					</table>
					{{ $result->links() }}
				</div>
				<hr>
			@endif
			@if (isset($day))
			<div class="container">
			
				<form method="POST" action="/tasks/addTask">
					<div class="form-group">	
						<h3>Add new task</h3><br/>Task topic:
						<textarea name="topic" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<input type="hidden" name="day" value="{{$day}}"/>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Send</input>
					</div>
				</form>

			</div>
			@endif

@stop

