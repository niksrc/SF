<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValentineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('valentine', function($table)
		{
		    $table->bigIncrements('id');
			$table->string('name','250');
			$table->string('college','500');
			$table->string('sex','20');
			$table->integer('age');
			$table->string('interests',2000);
			$table->longText('bio',5000);
			$table->bigInteger('tel');
			$table->string('lookingFor',2000);
			$table->string('pic',200);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
