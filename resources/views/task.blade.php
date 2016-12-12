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
					  <li><a href="/work">Dni pracy</a></li>
					  <li><a href="/tasks">Wszystkie Zadania</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
					  
					  <li><a href="">O stronie</a></li>
					  
					</ul>
				  </div><!--/.nav-collapse -->
				</div><!--/.container-fluid -->
			  </nav>
			</div>
			@if (empty($result))
				<div class="container">
					<hr>
					<h2>Brak zadań na dzień</h2>
					<hr>
				</div>
			@else
				
				<div class="container">
					<table class="table">
						<th>
							<td>ID</td>
							<td>Dzień</td>
							<td>Zadanie</td>
							<td>Data dodania</td>
							<td>Status</td>
							<td>Zmień Status</td>
						</th>
						@foreach ($result as $value)
						<tr>
							<td></td>
							<td>{{$value->id}}</td>
							<td>{{$value->day}}</td>
							<td>{{$value->topic}}</td>
							<td>{{$value->adddate}}</td>
							<td>
							@if ($value->todo)
							Do wykonania
							@else
							Wykonano
							@endif
							</td>
							<td>
								<form method="GET" action='/task/changeTask/{{$value->id}}'>
							
									<div class="form-group">
										<button type="submit" class="btn btn-primary">Zmień</button>
									</div>
								</form>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
				<hr>
			@endif

			<div class="container">
			
				<form method="POST" action="/task/addTask">
					<div class="form-group">	
						<h3>Dodaj nowe zadanie</h3><br/>Temat Zadania:
						<textarea name="topic" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<input type="hidden" name="day" value="{{$day}}"/>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Wyślij</input>
					</div>
				</form>

			</div>
@stop

