<?php


use App\Http\Livewire\CardController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\RolesController;
use App\Http\Livewire\UsersController;
use App\Http\Livewire\AsignarController;
use App\Http\Livewire\PatientsController;
use App\Http\Livewire\PermisosController;
use App\Http\Livewire\VaccinesController;
use App\Http\Livewire\CategoriesController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

  Route::get('categories', CategoriesController::class);
  Route::get('vaccines', VaccinesController::class);
  Route::get('pos', CardController::class);
  Route::get('patients', PatientsController::class);

  Route::group(['middleware' => ['role:Admin']], function () {
    Route::get('roles', RolesController::class);
    Route::get('permisos', PermisosController::class);
    Route::get('asignar', AsignarController::class);
    Route::get('users', UsersController::class);
  });

  //reportes PDF
  Route::get('download-pdf3', 'App\Http\Livewire\CardController@generar_pdf3')->name('descargar-pdf3');
  Route::get('download-pdf2', 'App\Http\Livewire\PatientsController@generar_pdf2')->name('descargar-pdf2');
  Route::get('download-pdf', 'App\Http\Livewire\VaccinesController@generar_pdf')->name('descargar-pdf');
  //reportes EXCEL
  Route::get('download-excel2', 'App\Http\Livewire\PatientsController@generar_excel2')->name('descargar-excel2');
  Route::get('download-excel', 'App\Http\Livewire\VaccinesController@generar_excel')->name('descargar-excel');
  Route::get('download-excel3', 'App\Http\Livewire\CardController@generar_excel')->name('descargar-excel3');

});