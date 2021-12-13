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

Route::get('/teste', function () {
    // $numeroDiaSemana = date('w', time());
    // $horarioFixo = strtotime("01:00:00 pm");
    // $horarioAtual = strtotime("now");

    // if ($numeroDiaSemana == 0 || $numeroDiaSemana == 5 || $numeroDiaSemana == 6) {
    //     if (($horarioAtual > $horarioFixo) && $tipoAtividade == "manutencaoUrgente") {
    //         echo 'Passou do horário para manutenções urgente!';
    //     } else {
    //         echo 'No horário!';

    //     }
    // } 
});

// *INDEX
Route::get('/', 'Admin\IndexController@index')->name('sistema');
Route::post('/fazer-login', 'Admin\IndexController@fazerLogin')->name('fazer-login');

// *HOME
Route::get('/sistema/home', 'Admin\HomeController@index')->name('home');
Route::get('/sistema/sair','Admin\HomeController@sair')->name('sair');

// *ADMINISTRADORES
Route::get('/sistema/administradores','Admin\AdministradoresController@index')->name('administradores');
Route::get('/sistema/cadastro-administrador','Admin\AdministradoresController@redirecionaCadastro')->name('cadastro-administrador');
Route::post('/sistema/fazer-cadastro-administrador','Admin\AdministradoresController@fazerCadastroAdministrador')->name('fazer-cadastro-administrador');
Route::get('/sistema/alterar-administrador/{idAdmin}','Admin\AdministradoresController@redirecionaAlterar')->name('alterar-administrador');
Route::post('/sistema/fazer-alteracao-administrador','Admin\AdministradoresController@fazerAlteracaoAdministrador')->name('fazer-alteracao-administrador');
Route::get('/sistema/remove-administrador/{idAdmin}','Admin\AdministradoresController@removerCadastro')->name('remove-administrador');

// *ATIVIDADES
Route::get('/sistema/atividades','Admin\AtividadesController@index')->name('atividades');
Route::get('/sistema/cadastro-atividade','Admin\AtividadesController@redirecionaCadastro')->name('cadastro-atividade');
Route::post('/sistema/fazer-cadastro-atividade','Admin\AtividadesController@fazerCadastroAtividade')->name('fazer-cadastro-atividade');
Route::get('/sistema/alterar-atividade/{idAtividade}','Admin\AtividadesController@redirecionaAlterar')->name('alterar-atividade');
Route::post('/sistema/fazer-alteracao-atividade','Admin\AtividadesController@fazerAlteracaoAtividade')->name('fazer-alteracao-atividade');
// Route::get('/sistema/remove-administrador/{idAdmin}','Admin\AdministradoresController@removerCadastro')->name('remove-administrador');

Route::get('/sistema/atividades-aberta','Admin\AtividadesController@atividadesAberta')->name('atividades-aberta');
Route::get('/sistema/concluir-atividade/{idAtividade}','Admin\AtividadesController@concluirAtividade')->name('concluir-atividade');
Route::get('/sistema/finalizar-atividade/{idAtividade}','Admin\AtividadesController@finalizarAtividade')->name('finalizar-atividade');
Route::get('/sistema/atividades-concluida','Admin\AtividadesController@atividadesConcluida')->name('atividades-concluida');
Route::get('/sistema/atividades-finalizada','Admin\AtividadesController@atividadesFinalizada')->name('atividades-finalizada');

