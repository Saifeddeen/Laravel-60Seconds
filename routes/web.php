<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\MainPageContentsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\LocalizationMiddleware;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

//60-seconds main page (index)
Route::get('/index', [MainPageContentsController::class, 'index'])->name('index')->middleware(['localization']);

//admin view
/*Route::get('/admin', function () {
    return view('Main.admin');
})->name('admin');
*/
//admin create clients and features from admin view
//Route::post('/admin/clients/create', [ClientsController::class, 'addClient'])->name('admin.clients.create');
//Route::post('/admin/features/create', [FeaturesController::class, 'addFeature'])->name('admin.features.create');

//layouts
/*Route::get('/side', function () {
    return view('Dashboard.Layouts.side-navbar');
});
Route::get('/nav', function () {
    return view('Dashboard.Layouts.top-navbar');
});
Route::get('/footer', function () {
    return view('Dashboard.Layouts.footer');
});*/

//login and register to enter dashboard
Route::get('/login', function () {
    return view('Dashboard.login');
})->name('login');

Route::get('/admin/register', function () {
    return view('Dashboard.register');
})->name('admin.register');

//Route::post('/admin/registing', [UsersController::class, 'register']);
//Route::post('abc', [UsersController::class, 'login']);
//Auth::routes();

//
Route::get('/home', function () {
    return view('dashboard.logout');
});

//display tables page, dashboard
/*Route::get('/tables', function () {
    return view('dashboard.tables');
})->name('tables');*/

//message store from 60-seconds index page
Route::post('/message/store', [MessagesController::class, 'store'])->name('message.store');


Route::get('/tryclients/index', [ClientsController::class, 'index'])->name('tryclients.index');

Route::middleware(['auth'])->group(function () {

    //dashboard main page (profile)
    Route::get('/dash', function () {
        return view('Dashboard.index');
    })->name('admin.dashboard');

    //users, clients, features, and messages indices
    Route::get('/users/index', [UsersController::class, 'index'])->name('users.index');
    Route::get('/clients/index', [ClientsController::class, 'index'])->name('clients.index');
    Route::get('/features/index', [FeaturesController::class, 'index'])->name('features.index');
    Route::get('/messages/index', [MessagesController::class, 'index'])->name('messages.index');

    //user update, delete, and create
    Route::get('users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('users/store', [UsersController::class, 'store'])->name('users.store');
    Route::get('users/update/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('users/update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::post('users/profile/update/{id}', [UsersController::class, 'updateProfile'])->name('users.profile.update');
    Route::delete('users/delete/{id}', [UsersController::class, 'destroy'])->name('users.delete');
    Route::delete('users/deleteSelected', [UsersController::class, 'destroySelected'])->name('users.deleteSelected');

    //client update, delete, and create
    Route::get('clients/create', [ClientsController::class, 'create'])->name('clients.create');
    Route::post('clients/store', [ClientsController::class, 'store'])->name('clients.store');
    Route::get('clients/update/{id}', [ClientsController::class, 'edit'])->name('clients.edit');
    Route::post('clients/update/{id}', [ClientsController::class, 'update'])->name('clients.update');
    Route::delete('clients/delete/{id}', [ClientsController::class, 'destroy'])->name('clients.delete');
    Route::delete('clients/deleteSelected', [ClientsController::class, 'destroySelected'])->name('clients.deleteSelected');

    //features update, delete, and create
    Route::get('features/create', [FeaturesController::class, 'create'])->name('features.create');
    Route::post('features/store', [FeaturesController::class, 'store'])->name('features.store');
    Route::get('features/update/{id}', [FeaturesController::class, 'edit'])->name('features.edit');
    Route::post('features/update/{id}', [FeaturesController::class, 'update'])->name('features.update');
    Route::delete('features/delete/{id}', [FeaturesController::class, 'destroy'])->name('features.delete');
    Route::delete('features/deleteSelected', [FeaturesController::class, 'destroySelected'])->name('features.deleteSelected');

    //messages update, delete, and create
    Route::get('messages/create', [MessagesController::class, 'create'])->name('messages.create');
    Route::post('messages/store', [MessagesController::class, 'store2'])->name('messages.store');
    Route::get('messages/update/{id}', [MessagesController::class, 'edit'])->name('messages.edit');
    Route::post('messages/update/{id}', [MessagesController::class, 'update'])->name('messages.update');
    Route::delete('messages/delete/{id}', [MessagesController::class, 'destroy'])->name('messages.delete');
    Route::delete('messages/deleteSelected', [MessagesController::class, 'destroySelected'])->name('messages.deleteSelected');

    Route::get('/log', [AuditController::class, 'getLogs'])->name('log');

    Route::get('/audits/export', [AuditController::class, 'export'])->name('audits.export');
    Route::post('/audits/import', [AuditController::class, 'import'])->name('audits.import');

    Route::get('/users/export', [UsersController::class, 'export'])->name('users.export');
    Route::post('/users/import', [UsersController::class, 'import'])->name('users.import');

    Route::get('/clients/export', [ClientsController::class, 'export'])->name('clients.export');
    Route::post('/clients/import', [ClientsController::class, 'import'])->name('clients.import');

    Route::get('/features/export', [FeaturesController::class, 'export'])->name('features.export');
    Route::post('/features/import', [FeaturesController::class, 'import'])->name('features.import');

    Route::get('/messages/export', [MessagesController::class, 'export'])->name('messages.export');
    Route::post('/messages/import', [MessagesController::class, 'import'])->name('messages.import');

});
