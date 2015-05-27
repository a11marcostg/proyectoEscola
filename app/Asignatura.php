<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model {

	//
	protected $table = 'asignaturas';

	protected $primaryKey = 'codigo';

	protected $fillable = ['nombre', 'grado'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['remember_token'];

	public function profesoresAsignatura(){

		
		return $this->belongsToMany('App\User', 'asignaturas_profesores')->withPivot('curso')->withTimestamps();

	}
	public function alumnosAsignatura(){

		
		return $this->belongsToMany('App\User', 'alumnos_asignaturas')->withPivot('curso','nota1','nota2','observacion1','observacion2','profesor')->withTimestamps();

	}
}
