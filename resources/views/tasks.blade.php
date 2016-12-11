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
					  <li class="active" ><a href="/tasks">Wszystkie Zadania</a></li>
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
					<h2>Brak zadań</h2>
					<hr>
				</div>
			@else
				<div class="container">
					Wyświetl od:<br/>
					<form method="POST" action="/tasks/showSelectedTasks">
						<input type="number" name="day" min="1" max="31" value="1" />
						<input type="number" name="month" min="1" max="12" value="12"/>
						<input type="number" name="year" min="1900" max="2100" value="2016"/><br/>
						Wyświetl do:<br/>

						<input type="number" name="day2" min="1" max="31" value="30"/>
						<input type="number" name="month2" min="1" max="12" value="12"/>
						<input type="number" name="year2" min="1900" max="2100" value="2016"/><br/><br/>
						<button type="submit" class="btn btn-primary"> Zmień kryteria wyszukiwania</button><br/><br/>
					</form>
				</div>
				
				<div class="container">
					<table class="table">
						<tr>
							<th>Dzień</th>
							<th>Zadanie</th>
							<th>Data dodania</th>
							<th>Status</th>
							<th>Zmień Status</th>
							<th>Usuń zadanie</th>
						</tr>
						@foreach ($result as $value)
						<tr>
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
								<form method="GET" action='/tasks/changeTask/{{$value->id}}'>
							
									<div class="form-group">
										<button type="submit" class="btn btn-primary">Zmień</button>
									</div>
								</form>
							</td>
							<td>
								<form method="GET" action="/tasks/deleteTask/{{$value->id}}">
									<div class="form-group">
										<button type="submit" class="btn btn-primary">Usuń</button>
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
			
				<form method="POST" action="/tasks/addTask">
					<div class="form-group">	
						<h3>Dodaj nowe zadanie</h3><br/>Temat Zadania:
						<textarea name="topic" class="form-control"></textarea>
					</div>
					<div class="form-group">	
						Data do wykonania:
						<input type="number" name="day" min="1" max="31" value="1" />
						<input type="number" name="month" min="1" max="12" value="12"/>
						<input type="number" name="year" min="1900" max="2100" value="2016"/><br/>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Wyślij</input>
					</div>
				</form>

			</div>
@stop

