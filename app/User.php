<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nick', 'nombre', 'apellido1', 'apellido2','dni','fechaNac','email','direccion','localidad','provincia','rol','password','validado','baja','fechaAlta','fechaBaja'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function asignaturasProfesor(){

		
		return $this->belongsToMany('App\Asignatura', 'asignaturas_profesores')->withPivot('curso')->withTimestamps();

	}
	public function asignaturasAlumno(){

		
		return $this->belongsToMany('App\Asignatura', 'alumnos_asignaturas')->withPivot('curso','nota1','nota2','observacion1','observacion2','profesor')->withTimestamps();

	}

}
