<?php

use App\Http\Controllers;

$app->get('/','ViewController@index');

$app->get('view','ViewController@index');

$app->get('workDays' , 'WorkDaysController@index');

$app->post('workDays/addWorkDay' , 'WorkDaysController@addWorkDay');

$app->post('workDays/showSelectedWorkDays' , 'WorkDaysController@showSelectedWorkDay');

$app->get('workDays/changeWorkDays/{id}' , 'WorkDaysController@changeWorkDay');


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