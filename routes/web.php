

<?php

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

//Route::get('/', function () {
//    return view('index');
//});
//Route::get('/',function(){
  //  return view('titulo');
//});

//Route::get('/', function () {
  //  return view('index');
//});

Route::get('/', 'CarroController@destaque')
    ->name('carros.destaque');

Route::resource('carros', 'CarroController');

Route::resource('marcas', 'MarcaController');

Route::resource('proposta', 'PropostaController');

Route::get('carrosfoto/{id}', 'CarroController@foto')
    ->name('carros.foto');
Route::post('carrosfotostore', 'CarroController@storeFoto')
    ->name('carros.store.foto');

Route::get('carrosoferta/{id}', 'CarroController@oferta')
    ->name('carros.oferta');

Route::get('carrospesq', 'CarroController@pesq')
    ->name('carros.pesq');

Route::get('carrosgraf', 'CarroController@graf')
    ->name('carros.graf');

Route::post('carrosfiltros', 'CarroController@filtros')
    ->name('carros.filtros');

//----------------

Route::get('propostas_list','PropostaController@index');

//Route::get('/home', 'HomeController@index');

Route::get('/home', 'CarroController@destaque')->name('carros.home');

Route::get('carrosstoredestaque/{id}', 'CarroController@storedestaque')
    ->name('carros.store.destaque');






Auth::routes();

Route::get('/arearestrita', 'HomeController@index');
Route::get('register', function() {
    return "<h1> Acesso Restrito </h1>";


});