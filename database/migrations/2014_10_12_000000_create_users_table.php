<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nick')->unique();
			$table->string('nombre');
			$table->string('apellido1');
			$table->string('apellido2');
			$table->string('dni',9)->unique();
			$table->string('fechaNac');
			$table->string('email')->unique();
			$table->string('direccion');
			$table->string('localidad');
			$table->string('provincia');
			$table->integer('rol');
			$table->string('password', 12);
			$table->boolean('validado');
			$table->boolean('baja');
			$table->date('fechaAlta');
			$table->date('fechaBaja');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 * ['nick', 'nombre', 'apellido1', 'apellido2','dni','fechaNac','email','direccion','localidad','provincia','rol','password','validado','baja','fechaAlta','fechaBaja'];
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
