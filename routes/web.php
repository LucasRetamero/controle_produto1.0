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
});

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