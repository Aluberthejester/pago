<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\BonusController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\SalarioController;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('posts', PostController::class)->middleware(['auth']);
Route::resource('employees', EmployeeController::class)->middleware(['auth']);
Route::resource('tickets', TicketController::class)->middleware(['auth']);
Route::resource('bonuses', BonusController::class)->middleware(['auth']);
Route::resource('contracts', ContractController::class)->middleware(['auth']);
Route::resource('reporte_salarios', ReporteController::class)->middleware(['auth']);
Route::resource('descuentos', SalarioController::class)->middleware(['auth']);
Route::get('/descuentos/index/pdf', [SalarioController::class, 'indexPDF']);
Route::resource('empleados', EmpleadoController::class)->middleware(['auth']);
Route::post('/empleados/index/pdf', [EmpleadoController::class, 'indexPDF']);

require __DIR__.'/auth.php';
