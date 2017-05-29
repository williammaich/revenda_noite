

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

Route::resource('carros', 'CarroController');
Route::resource('marcas','MarcaController');



Route::get('carrosfoto/{id}', 'CarroController@foto')
    ->name('carros.foto');
Route::post('carrosfotostore', 'CarroController@storeFoto')
    ->name('carros.store.foto');
Route::get('carrospesq', 'CarroController@pesq')
    ->name('carros.pesq');
Route::get('carrosgraf', 'CarroController@graf')
    ->name('carros.graf');
Route::post('carrosfiltros', 'CarroController@filtros')
    ->name('carros.filtros');

//-------------------

Route::get('/','PainelController@titulo');
Route::get('/','PainelController@destaque');
Route::get('/','PainelController@catalogo_marcas');
Route::get('catalogo','PainelController@mostrar');
Route::get('pinelfoto/{id}', 'CarroController@foto')
    ->name('painel.foto');


//---------------------
Auth::routes();

Route::get('/arearestrita', 'HomeController@index');

Route::get('register', function() {
    return "<h1> Acesso Restrito </h1>";
});
