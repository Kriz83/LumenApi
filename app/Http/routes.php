<?php

use App\Http\Controllers;

$app->get('/','ViewController@index');

$app->get('view','ViewController@index');


$app->get('workDays' , 'WorkDaysController@index');

$app->post('workDays/addWorkDay' , 'WorkDaysController@addWorkDay');

$app->post('workDays/selectedWorkDays' , 'WorkDaysController@selectedWorkDays');

$app->get('workDays/changeWorkDay/{id}' , 'WorkDaysController@changeWorkDay');


$app->get('tasks' , 'TasksController@index');

$app->post('tasks/addTask' , 'TasksController@addTask');

$app->post('tasks/showSelectedTasks' , 'TasksController@showSelectedTasks');

$app->get('tasks/changeTask/{id}' , 'TasksController@changeTask');

$app->get('tasks/{day}/showDayTask' , 'TasksController@showDayTask');

$app->get('tasks/deleteTask/{id}' , 'TasksController@deleteTask');
