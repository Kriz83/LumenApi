<?php

use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/*$app->get('/', function () use ($app) {
	$cars = ['Mercedes' , 'Honda'];
	
    return view('view' , compact('cars'));
});
*/
$app->get('/','ViewController@index');

$app->get('view','ViewController@index');

$app->get('work' , 'WorkController@index');

$app->post('work/addWork' , 'WorkController@addWork');

$app->post('work/showSelectedWork' , 'WorkController@showSelectedWork');

$app->get('work/changeWork/{id}' , 'WorkController@changeWork');


$app->get('tasks' , 'TasksController@index');

$app->post('tasks/addTask' , 'TasksController@addTask');

$app->post('tasks/showSelectedTasks' , 'TasksController@showSelectedTasks');

$app->get('tasks/changeTask/{id}' , 'TasksController@changeTask');

$app->get('tasks/showDayTask/{id}' , 'TasksController@showDayTask');

$app->get('tasks/deleteTask/{id}' , 'TasksController@deleteTask');


$app->get('task' , 'TaskController@index');

$app->get('task/{day}/showDayTask/{id}' , 'TaskController@showDayTask');

$app->post('task/addTask' , 'TaskController@addTask');

$app->get('task/changeTask/{id}' , 'TaskController@changeTask');