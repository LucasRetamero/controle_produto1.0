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

Route::get('/', function(){
 return view('login.index');
});

Route::get('/home', 'Dashboard\homeController@index')->middleware('auth');

//Grupo de rotas: Dashboard
Route::group(['prefix' => 'dashboard'], function(){

//Rota: Home Dashboard
Route::get('/', 'Dashboard\homeController@index')->name('dashboard');

//Rota: Lista de Produtos
Route::get('cadastro/produtos', 'Cadastro\ProdutosController@index')->name('dashboard.cadastro.produto');

//Rota: Searching Lista de Produtos
Route::post('cadastro/produtos/searching', 'Cadastro\ProdutosController@searchingMenu')->name('dashboard.cadastro.produto.searching');

//Rota: Formulario de Produtos
Route::get('cadastro/produtos/produtosFormulario', 'Cadastro\ProdutosController@indexFormProduto')->name('dashboard.cadastro.produto.productAddForm');

//Rota: Add/Update/Remove/Cancel Produto
Route::post('cadastro/produtos/produtosFormulario/action', 'Cadastro\ProdutosController@actionsMenu')->name('dashboard.cadastro.produto.productAddForm.action');

//Rota: Update Form Produto
Route::get('Cadastro/produtos/produtosFormulario/editar/{id}', 'Cadastro\ProdutosController@editFormProduto')->name('dashboard.cadastro.produto.productAddForm.edit');

//Rota: Remove produto
Route::get('Cadastro/produtos/produtosFormulario/remover/{id}', 'Cadastro\ProdutosController@removeProduto')->name('dashboard.cadastro.produto.productAddForm.remove');

//Rota: Lista do Estoque
Route::get('cadastro/estoque', 'Cadastro\EstoqueController@index')->name('dashboard.cadastro.estoque');

//Rota: Searching Estoque
Route::post('cadastro/estoque/searching', 'Cadastro\EstoqueController@searchingMenu')->name('dashboard.cadastro.estoque.searching');

//Rota: Formulario do Estoque
Route::get('cadastro/produtos/estoqueFormulario','Cadastro\EstoqueController@getEstoqueForm')->name('dashboard.cadastro.estoque.estoqueAddForm');

//Rota: Add/Edit/Remove Estoque
Route::post('cadastro/produtos/estoqueFormulario/ActionsList','Cadastro\EstoqueController@actionsList')->name('dashboard.cadastro.estoque.estoqueAddForm.actionsList');

//Rota: Get a produc to the Estoque
Route::get('cadastro/produtos/estoqueFormulario/getProduto', 'Cadastro\EstoqueController@getEstoqueFormWithProduct')->name('dashboard.cadastro.estoque.estoqueAddForm.getProduto');

//Rota: Edit/Remove from table
Route::get('cadastro/produtos/estoque/table/{id}/{option}','Cadastro\EstoqueController@actionsListeTable')->name('dashboard.cadastro.estoque.actionsList');

//Rota: Lista de Endereço
Route::get('cadastro/enderecos', 'Cadastro\EnderecoController@index')->name('dashboard.cadastro.endereco');

//Rota: Searching Endereço
Route::post('cadastro/enderecos/searching', 'Cadastro\EnderecoController@searchingAction')->name('dashboard.cadastro.endereco.searching');

//Rota: open form to edit or remove Endereço
Route::get('cadastro/enderecos/enderecoFormulario/editOrRemove/{id}/{option}', 'Cadastro\EnderecoController@editRemoveTable')->name('dashboard.cadastro.endereco.enderecoForm.editOrRemove');

//Rota: Add/Edit or remove Endereço
Route::post('cadastro/enderecos/enderecoFormulario/actionsMenu', 'Cadastro\EnderecoController@actionsMenu')->name('dashboard.cadastro.endereco.enderecoForm.actionsMenu');

//Rota: Formulario do Endereço
Route::get('cadastro/enderecos/enderecoFormulario', function(){
 return view('dashboard.cadastro.endereco.enderecoForm');
})->name('dashboard.cadastro.endereco.enderecoAddForm');

//Rota: Lista Tipo de Endereço
Route::get('cadastro/tipo_Endereco/tipoEndereco', 'Cadastro\TipoEnderecoController@index')->name('dashboard.cadastro.tipo_endereco');

//Rota: Searching Tipo de Endereço
Route::post('cadastro/tipo_Endereco/tipoEndereco/searching', 'Cadastro\TipoEnderecoController@searchingAction')->name('dashboard.cadastro.tipo_endereco.searching');

//Rota: open Formulario tipo do endereço to edit or remove
Route::get('cadastro/tipo_Endereco/tipoEndereco/tipoEnderecoFormulario/editOrRemove/{id}/{option}', 'Cadastro\TipoEnderecoController@editRemoveLoteTable')->name('dashboard.cadastro.tipo_endereco.tipo_enderecoForm.editRemove');

//Rota: Add, edit or remove tipo do endereço to
Route::post('cadastro/tipo_Endereco/tipoEndereco/tipoEnderecoFormulario/actionsMenu', 'Cadastro\TipoEnderecoController@actionsMenu')->name('dashboard.cadastro.tipo_endereco.tipo_enderecoForm.actionsMenu');

//Rota: Formulario Tipo de Endereço
Route::get('cadastro/tipoEndereco/tipoEnderecoFormulario', function(){
 return view('dashboard.cadastro.tipoEndereco.tipoEnderecoForm');
})->name('dashboard.cadastro.tipo_endereco.tipoEnderecoAddForm');

//Rota: Lista de Lote
Route::get('cadastro/lote', 'Cadastro\LoteController@index')->name('dashboard.cadastro.lote');

//Rota: Searching like name or all Lote
Route::post('cadastro/lote/searching', 'Cadastro\LoteController@searchingAction')->name('dashboard.cadastro.lote.searching');

//Rota: Actions Add/Edit/Remove Lote
Route::post('cadastro/lote/actionsMenu', 'Cadastro\LoteController@actionsMenu')->name('dashboard.cadastro.lote.loteForm.actionsMenu');

//Rota: Formulario do Lote to add
Route::get('cadastro/lote/loteFormulario',function(){
 return view('dashboard.cadastro.lote.loteForm');
})->name('dashboard.cadastro.lote.loteAddForm');

//Rota: Formulario do Lote to edit or remove
Route::get('cadastro/lote/loteFormulario/EditOrRemove/{id}/{option}','Cadastro\LoteController@editRemoveLoteTable')->name('dashboard.cadastro.lote.loteAddForm.editOrRemove');

//Rota: Lista de Localizacao
Route::get('cadastro/localizacao','Cadastro\LocalizacaoController@index')->name('dashboard.cadastro.localizacao');

//Rota: Searching Localizacao Name or All
Route::post('cadastro/localizacao/searchingActions','Cadastro\LocalizacaoController@searchingMenu')->name('dashboard.cadastro.localizacao.searching');

//Rota: List of actions Add, edit or remove Localizacao
Route::post('cadastro/localizacao/localizacaoFormulario/actionsMenu', 'Cadastro\LocalizacaoController@actionsMenu')->name('dashboard.cadastro.localizacao.localizacaoAddForm.actionsMenu');

//Rota: Form da localizacao to edit or remove
Route::get('cadastro/localizacao/localizacaoFormulario/EditRemove/{id}/{option}', 'Cadastro\LocalizacaoController@indexFormToEditRemove')->name('dashboard.cadastro.localizacao.localizacaoAddForm.editRemove');

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
Route::get('configuracao/usuarios/usuariosFormulario', 'Configuracao\UsuarioController@userForm')->name('dashboard.configuracao.usuarios.userFormAdd');


// Route: Business list
Route::get('configuracao/empresa', 'Configuracao\EmpresaController@index')->name('dashboard.configuracao.empresa');
// Route: Business form
Route::get('configuracao/empresa/empresaFormulario', 'Configuracao\EmpresaController@empresaForm')->name('dashboard.configuracao.empresa.form');
// Route: Business form to edit data
Route::get('configuracao/empresa/empresaFormulario/{id}', 'Configuracao\EmpresaController@empresaFormToEditData')->name('dashboard.configuracao.empresa.form.edit');
// Route Business Send from form
Route::post('configuracao/empresa/AddEditRemovEmpresa', 'Configuracao\EmpresaController@btnAction')->name('dashboard.configuracao.empresa.editarFormulario');

//Lista de PDFs --------

//Home do produto para configurar relatório
Route::get('cadastro/produtos/configurarPdf','PDF\ProdutosPdfController@index')->name('dashboard.pdf.produtos.configurarPdf');

//Choose type all / produtos / Nome / Fornecedor / Sub-Especie
Route::get('cadastro/produtos/configurarPdf/actionsMenu', 'PDF\ProdutosPdfController@actionsMenu')->name('dashboard.pdf.produtos.actionsMenu');

//Home do endereço para configurar relatório
Route::get('cadastro/endereco/gerarPdf','PDF\EnderecoPdfController@index')->name('dashboard.pdf.endereco.configurarPdf');

//Choose type all / endereco
Route::get('cadastro/endereco/configurarPdf/actionsMenu', 'PDF\EnderecoPdfController@actionsMenu')->name('dashboard.pdf.endereco.actionsMenu');

//Home do estoque para configurar relatório
Route::get('cadastro/estoque/configurarPdf','PDF\EstoquePdfController@index')->name('dashboard.pdf.estoque.configurarPdf');

//Choose type all / nome produto e etc
Route::get('cadastro/estoque/configurarPdf/actionsMenu', 'PDF\EstoquePdfController@actionsMenu')->name('dashboard.pdf.estoque.actionsMenu');

//Home do Apuração de Ocorrencia
Route::get('cadastro/apuracaoOcorrencia/configurarPdf','PDF\apuracaoOcorrenciaController@index')->name('dashboard.pdf.apuracao_ocorrencia.configurarPdf');

//Choose type all / nome produto e etc
Route::post('cadastro/apuracaoOcorrencia/configurarPdf/actionsMenu', 'PDF\apuracaoOcorrenciaController@actionsMenu')->name('dashboard.pdf.apuracao_ocorrencia.actionsMenu');

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




