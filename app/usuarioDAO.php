<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuarioDAO extends Model
{
    public $table       = "usuario_table";
	public $timestamps  = false;
	protected $fillable = ['id_user', 
	                       'nome',
						   'sobrenome',
						   'email',
						   'login',
						   'nivelAcesso'];
	protected $guarded  = ['password'];					   
}
