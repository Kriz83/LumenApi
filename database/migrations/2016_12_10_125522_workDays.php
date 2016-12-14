<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WorkDays extends Migration
{

    public function up()
    {
        Schema::create('work_days', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('day')->unique();
			$table->string('type');
			$table->Timestamps();
			
		});
    }

    public function down()
    {
        //
    }
}
