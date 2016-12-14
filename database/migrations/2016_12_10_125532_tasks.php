<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tasks extends Migration
{

    public function up()
    {
        Schema::create('tasks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('day');
			$table->longText('topic' , 255);
			$table->timestampTz('adddate');
			$table->integer('todo');
			$table->Timestamps();
		});
    }

    public function down()
    {
        //
    }
}
