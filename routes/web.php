

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


//use Illuminate\Routing\Route;


//use Symfony\Component\Routing\Annotation\Route;

//use Symfony\Component\Routing\Route;


//Route::get('/', function () {
  //  return view('index');
//});
//Route::get('/',function(){
//  return view('titulo');
//});

Route::get('/', 'CarroController@destaque')
    ->name('carros.destaque');

Route::resource('carros', 'CarroController');

Route::resource('marcas', 'MarcaController');

Route::resource('propostas', 'PropostaController');

Route::resource('paineis','PainelController');

Route::get('carrosfoto/{id}', 'CarroController@foto')
    ->name('carros.foto');

Route::post('carrosfotostore', 'CarroController@storeFoto')
    ->name('carros.store.foto');


Route::get('carrospesq', 'CarroController@pesq')
    ->name('carros.pesq');

Route::get('carrosgraf', 'CarroController@graf')
    ->name('carros.graf');

Route::get('propostasgraf','PropostaController@graf')
    ->name('propostas.graf');

Route::post('carrosfiltros', 'CarroController@filtros')
    ->name('carros.filtros');

Route::get('propostas_list','PropostaController@index');
//---------------------------------------------

Route::post('carrosfiltros3', 'CarroController@filtros3')
    ->name('carros.filtros3');

Route::get('/home', 'CarroController@destaque')->name('carros.home');

Route::get('carrosstoredestaque/{id}', 'CarroController@storedestaque')
    ->name('carros.store.destaque');



Route::get('catalogo','CarroController@mostrar');

Route::get('user_pesquisa','CarroController@pesquisar');

Route::get('catalogo_marcas','CarroController@catalogo_marcas');







//-------------------------------------------------------------------
Auth::routes();

Route::get('/arearestrita', 'HomeController@index');
/*
Route::get('register', function() {
    return "<h1> Acesso Restrito </h1>";
});*/