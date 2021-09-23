<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
	return view('login.index');
})->name('home');

Route::group(['prefix' => 'dashboard'], function(){

Route::get('/', function(){
   return view('dashboard.index');	
})->name('dashboard');

Route::get('cadastro/produtos', function(){
  return view('dashboard.cadastro.produto.produto');
})->name('dashboard.cadastro.produto');

Route::get('cadastro/produtos/produtosFormulario', function(){
 return view('dashboard.cadastro.produto.produtoForm');	
})->name('dashboard.cadastro.produto.productAddForm');

Route::get('cadastro/estoque', function(){
 return view('dashboard.cadastro.estoque.estoque');
})->name('dashboard.cadastro.estoque');

Route::get('cadastro/produtos/estoqueFormulario', function(){
 return view('dashboard.cadastro.estoque.estoqueForm');
})->name('dashboard.cadastro.estoque.estoqueAddForm');

Route::get('cadastro/enderecos', function(){
 return view('dashboard.cadastro.endereco.endereco');
})->name('dashboard.cadastro.endereco');

Route::get('cadastro/enderecos/enderecoFormulario', function(){
 return view('dashboard.cadastro.endereco.enderecoForm');
})->name('dashboard.cadastro.endereco.enderecoAddForm');

Route::get('cadastro/tipo_Endereco/tipoEndereco', function(){
 return view('dashboard.cadastro.tipoEndereco.tipoEndereco');
})->name('dashboard.cadastro.tipo_endereco.tipoEndereco');

Route::get('cadastro/tipoEndereco/tipoEnderecoFormulario', function(){
 return view('dashboard.cadastro.tipoEndereco.tipoEnderecoForm');
})->name('dashboard.cadastro.tipo_endereco.tipoEnderecoAddForm');


Route::get('configuracao/exportacao', function(){
  return view('dashboard.configuration.exportacao');	
})->name('dashboard.configuracao.exportacao');

Route::get('configuracao/importacao', function(){
 return view('dashboard.configuration.importacao');	
})->name('dashboard.configuracao.importacao');

Route::get('configuracao/usuarios', function(){
 return view('dashboard.configuration.usuario.usuario');
})->name('dashboard.configuracao.usuarios');

Route::get('configuracao/usuarios/usuariosFormulario', function(){
	return view('dashboard.configuration.usuario.usuarioForm');
})->name('dashboard.configuracao.usuarios.userFormAdd');

});