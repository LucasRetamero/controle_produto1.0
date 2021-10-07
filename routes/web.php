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

Route::get('/home', 'Dashboard\homeController@index')->middleware('auth');

Route::group(['prefix' => 'dashboard'], function(){

//Rota: Home Dashboard
Route::get('/', function(){
   return view('dashboard.index');	
})->name('dashboard');

//Rota: Lista de Produtos
Route::get('cadastro/produtos', 'Cadastro\ProdutosController@index')->name('dashboard.cadastro.produto');

//Rota: Formulario de Produtos
Route::get('cadastro/produtos/produtosFormulario', function(){
 return view('dashboard.cadastro.produto.produtoForm');	
})->name('dashboard.cadastro.produto.productAddForm');

//Rota: Add/Update/Remove/Cancel Produto
Route::post('cadastro/produtos/produtosFormulario/action', 'Cadastro\ProdutosController@actionsMenu')->name('dashboard.cadastro.produto.productAddForm.action');

//Rota: Update Form Produto
Route::get('Cadastro/produtos/produtosFormulario/editar/{id}', 'Cadastro\ProdutosController@editFormProduto')->name('dashboard.cadastro.produto.productAddForm.edit');

//Rota: Remove produto
Route::get('Cadastro/produtos/produtosFormulario/remover/{id}', 'Cadastro\ProdutosController@removeProduto')->name('dashboard.cadastro.produto.productAddForm.remove');

//Rota: Lista do Estoque
Route::get('cadastro/estoque', function(){
 return view('dashboard.cadastro.estoque.estoque');
})->name('dashboard.cadastro.estoque');

//Rota: Formulario do Estoque
Route::get('cadastro/produtos/estoqueFormulario', function(){
 return view('dashboard.cadastro.estoque.estoqueForm');
})->name('dashboard.cadastro.estoque.estoqueAddForm');

//Rota: Lista de Endereço
Route::get('cadastro/enderecos', function(){
 return view('dashboard.cadastro.endereco.endereco');
})->name('dashboard.cadastro.endereco');

//Rota: Formulario do Endereço
Route::get('cadastro/enderecos/enderecoFormulario', function(){
 return view('dashboard.cadastro.endereco.enderecoForm');
})->name('dashboard.cadastro.endereco.enderecoAddForm');

//Rota: Lista Tipo de Endereço
Route::get('cadastro/tipo_Endereco/tipoEndereco', function(){
 return view('dashboard.cadastro.tipoEndereco.tipoEndereco');
})->name('dashboard.cadastro.tipo_endereco');

//Rota: Formulario Tipo de Endereço
Route::get('cadastro/tipoEndereco/tipoEnderecoFormulario', function(){
 return view('dashboard.cadastro.tipoEndereco.tipoEnderecoForm');
})->name('dashboard.cadastro.tipo_endereco.tipoEnderecoAddForm');

//Rota: Lista de Lote
Route::get('cadastro/lote',function(){
 return view('dashboard.cadastro.lote.lote');	
})->name('dashboard.cadastro.lote');

//Rota: Formulario do Lote
Route::get('cadastro/lote/loteFormulario',function(){
 return view('dashboard.cadastro.lote.loteForm');	
})->name('dashboard.cadastro.lote.loteAddForm');

//Rota: Lista de Localizacao
Route::get('cadastro/localizacao',function(){
 return view('dashboard.cadastro.localizacao.localizacao');	
})->name('dashboard.cadastro.localizacao');

//Rota: Formulario da localizacao
Route::get('cadastro/localizacao/localizacaoFormulario',function(){
 return view('dashboard.cadastro.localizacao.localizacaoForm');	
})->name('dashboard.cadastro.localizacao.localizacaoAddForm');

//Rota: Lista de Sub Especie
Route::get('cadastro/subEspecie', 'Cadastro\SubEspecieController@index')->name('dashboard.cadastro.subEspecie');

//Rota: Add/edit/remove Sub Especie
Route::post('cadastro/subEspecie/actions', 'Cadastro\SubEspecieController@actionsMenu')->name('dashboard.cadastro.actions');

//Rota: Form Sub Especie to edit
Route::get('cadastro/subEspecie/editForm/{id}', 'Cadastro\SubEspecieController@editForm')->name('dashboard.cadastro.subEspecie.edit');
//Rota: Remove Sub Especie by url
Route::get('cadastro/subEspecie/remove/{id}', 'Cadastro\SubEspecieController@getDeleteByUrl')->name('dashboard.cadastro.subEspecie.remove');

//Rota: Searching by Sub Especie
Route::post('cadastro/subEspecie/searching', 'Cadastro\SubEspecieController@searchBySubEspecie')->name('dashboard.cadastro.subEspecie.searching');

//Rota: Formulario da Sub Especie
Route::get('cadastro/subEspecie/subEspecieFormulario',function(){
 return view('dashboard.cadastro.subEspecie.subEspecieForm');	
})->name('dashboard.cadastro.subEspecie.subEspecieAddForm');


//Rota: Exportar database
Route::get('configuracao/exportacao', function(){
  return view('dashboard.configuration.exportacao');	
})->name('dashboard.configuracao.exportacao');

//Rota: Importar Database
Route::get('configuracao/importacao', function(){
 return view('dashboard.configuration.importacao');	
})->name('dashboard.configuracao.importacao');

//Rota: Lista de Usuarios
Route::get('configuracao/usuarios', 'Configuracao\UsuarioController@listaUsuarios')->name('dashboard.configuracao.usuarios');

//Rota: Formulario de Usuarios
Route::get('configuracao/usuarios/usuariosFormulario', function(){
	return view('dashboard.configuration.usuario.usuarioForm');
})->name('dashboard.configuracao.usuarios.userFormAdd');

});

//Grupo de rotas: Login
Route::group(['prefix' => 'login', 'namespace' => 'Configuracao'], function(){

//Acessar login page
Route::get('/','UsuarioController@index')->name('login');	

//Realizar login
Route::post('/logar', 'UsuarioController@authenticate')->name('login.logar');	

//Add/Edit or Remove usuario
Route::post('/addEditRemUsuario', 'UsuarioController@addEditRemUsuario')->name('login.addEditRemUsuario');

//Deslogar login
Route::get('/deslogar', 'UsuarioController@deslogar')->name('login.deslogar');	

//Editar Usuario
Route::get('editarUsuarioForm/{id}', 'UsuarioController@editOuRemoverUsuario')->name('login.editarFormulario');

//Consultar Usuario
Route::get('consultarUsuario', 'UsuarioController@searchUsuario')->name('login.consultaUsuario');
});




