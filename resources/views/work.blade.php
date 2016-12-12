

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
					  <li class="active"><a href="/work">Dni pracy</a></li>
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
					<h2>Brak dodanych dni pracy</h2>
					<hr>
				</div>
			@else
				<div class="container">
				@if (isset($error) && $error == true)
					<b>Dzień pracy już istnieje, dodaj zadania do istniejącego dnia</b>
				@endif
				</div>
				<div class="container">
					Wyświetl od:<br/>
					<form method="POST" action="/work/showSelectedWork">
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
						<th>Dostępność</th>
						<th>Zmień dostępność</th>
						<th>Zadania</th>
					
					</tr>
					@foreach ($result->all() as $value)
					<tr>
						<td>{{$value->day}}</td>
						<td>{{$value->type}}</td>
						<td>
							<form method="GET" action='/work/changeWork/{{$value->id}}'>
								<div class="form-group">
									<button type="submit" class="btn btn-primary">Zmień</button>
								</div>
							</form>
						</td>
						<td><a href='/task/{{$value->day}}/showDayTask/{{$value->id}}'>Zadania z dnia <b>{{$value->day}}</b>
						</a></td>
					@endforeach
				</table>
				{{ $result->links() }}
			</div>
			<br/><hr><br/>
			@endif
			
			<div class="container">
			
				<form method="POST" action="/work/addWork">
				<h2>Dodaj dni pracy</h2>
					<div class="form-group">	
						<b>Data dostępności:</b>
						<input type="number" name="day" min="1" max="31" value="1" />
						<input type="number" name="month" min="1" max="12" value="12"/>
						<input type="number" name="year" min="1900" max="2100" value="2016"/><br/>
					</div>
					<div class="form-group">	
						<label><input type="radio" name="workType" value="Praca" checked> Praca</input></label><br/>
						<label><input type="radio" name="workType" value="Urlop"> Urlop</input></label><br>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Wyślij</input>
					</div>
				</form>

			</div>

@stop
