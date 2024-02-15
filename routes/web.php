<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ImportController;
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
    return view('marketplace.home');
});

Auth::routes();

Route::post('/login',[LoginController::class,'loginUser'])->name('login');
Route::get('/register/form',[RegisterController::class,'registerForm'])->name('register');
Route::post('/register',[RegisterController::class,'registerUser']);
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/user/add', [App\Http\Controllers\UserController::class, 'addUser']);
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile']);
/**
 * Pament Route
 * */
    
    Route::get('/events', [App\Http\Controllers\UserController::class, 'events']);
    Route::get('/payments', [App\Http\Controllers\UserController::class, 'getPayments']);
    Route::get('/payments/report', [App\Http\Controllers\UserController::class, 'getYearlyPaymentInfo']);
    Route::get('/payments/pieChart/report', [App\Http\Controllers\UserController::class, 'getMonthlyPaymentInfo']);
    Route::get('/payments/list', [App\Http\Controllers\UserController::class, 'listPayments'])->name('payments.list');
    Route::get('/payments/user/add', [App\Http\Controllers\UserController::class, 'addUserPayments']);
    Route::get('/payments/user/edit/{id}', [App\Http\Controllers\UserController::class, 'editUserPayments']);
    Route::get('/email', [App\Http\Controllers\UserController::class, 'html_email']);
    Route::post('/payments/user/store', [App\Http\Controllers\UserController::class, 'store']);
    Route::get('create-pdf-file', [PDFController::class, 'index']);
/**
 * @end
 * */
    Route::get('/users', [App\Http\Controllers\UserController::class, 'getUsers']);
    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'editUser']);
    Route::post('/create/user', [App\Http\Controllers\UserController::class, 'createUser']);
    Route::get('/users/list', [App\Http\Controllers\UserController::class, 'listUsers'])->name('users.list');
    
   /*
   |------------------------------------------Reports Route -----------------------------------------
   */
   Route::get('/payments/month-reports',[ReportsController::class,'viewReport']);
   Route::get('/reports/list', [ReportsController::class,'getReports']);
   Route::get('/reports/year/list', [ReportsController::class,'getYearlyList']);

   Route::get('/payments/year-reports', [ReportsController::class,'getYearlyReports']);
   Route::get('/roles', [RolesController::class,'role'])->name('roles.list');
   Route::get('/roles/list', [RolesController::class,'getRoles']);
   Route::get('/roles/add', [RolesController::class,'roleForm']);
   Route::post('/create/role', [RolesController::class,'createRole']);
   Route::get('/user/assign-role/{id}', [RolesController::class,'assignRoleView']);
   Route::get('/role/edit/{id}', [RolesController::class, 'editRole']);
   Route::get('/role/delete/{id}', [RolesController::class, 'deleteRole']);
   Route::post('/assign/role', [RolesController::class, 'assignRoleToUser']);
   /*
   |------------------------------------------Imports Route ------------------------------------------
   */
   Route::get('/import',[ImportController::class,'importScreen'])->name('import');
   Route::post('/users/import', [ImportController::class, 'importData']);
});
