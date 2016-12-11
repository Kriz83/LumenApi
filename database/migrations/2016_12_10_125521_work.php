<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Work extends Migration
{

    public function up()
    {
        Schema::create('work', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('day');
			$table->string('type');
			
		});
    }

    public function down()
    {
        //
    }
}
