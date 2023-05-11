<?php

namespace App\Models\Configuracao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class EmpresaDAO extends Model
{
    protected $table = 'empresa';
    protected $fillable = ['razao_social',
                           'fantasia',
	                       'cnpj',
						   'email',
						   'contato'];
	public $timestamps = false;

	public function addEmpresa($dados){
        return EmpresaDAO::create([
            'razao_social' => $dados['razao_social'],
            'fantasia'     => $dados['fantasia'],
            'cnpj'         => $dados['cnpj'],
            'email'        => $dados['email'],
            'contato'      => $dados['contato'],
        ]);
	}

	public function editEmpresa($id,$dados){
        return EmpresaDAO::where('id', $id)
                        ->update([
                            'razao_social' => $dados['razao_social'],
                            'fantasia'     => $dados['fantasia'],
                            'cnpj'         => $dados['cnpj'],
                            'email'        => $dados['email'],
                            'contato'      => $dados['contato'],
                        ]);
	}

	public function removeEmpresa($id){
        return EmpresaDAO::where('id', $id)
                           ->delete();
	}

	public function getAllList(){
        return EmpresaDAO::all();
	}

	public function getBusinessByID($id){
        return EmpresaDAO::where('id', $id)
                           ->get();
	}

	public function getBusinessByEmail($email){
        return EmpresaDAO::where('email', 'like', $email.'%')
                           ->get();
	}

    public function getBusinessByCNPJ($email){
        return EmpresaDAO::where('cnpj', 'like', $email.'%')
                           ->get();
	}

}
