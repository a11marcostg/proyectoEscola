<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('asignaturas', function(Blueprint $table)
		{
			$table->increments('codigo');
			$table->string('nombre');
			$table->string('grado');
			$table->timestamps();
		});


		Schema::create('asignaturas_profesores',function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->index();	
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
 
			
			$table->integer('asignatura_codigo')->unsigned()->index();
			$table->foreign('asignatura_codigo')->references('codigo')->on('asignaturas')->onDelete('cascade');
			$table->primary('curso');
 
			$table->timestamps();
		});
		Schema::create('alumnos_asignaturas',function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
 
			
			$table->integer('asignatura_codigo')->unsigned()->index();
			$table->foreign('asignatura_codigo')->references('codigo')->on('asignaturas')->onDelete('cascade');


 
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('asignaturas');
	}

}
