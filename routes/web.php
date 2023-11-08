<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

use App\Models\Todo;
use App\Models\Task;
use App\Models\Folder;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();


Route::group(['middleware' => 'auth'], function() {
    //ホーム画面
    Route::get('/', [HomeController::class, 'index'])->name('home');

    //一覧表示
    Route::get('/folders/{id}/tasks', [TodoController::class, 'index'])->name('tasks.index');

    //フォルダ作成
    Route::get('/folders/create', [FolderController::class, 'showCreateForm'])->name('folders.create');
    Route::post('/folders/create', [FolderController::class, 'create']);

    //タスク追加
    Route::get('/folders/{id}/tasks/create', [TodoController::class, 'showCreateForm'])->name('tasks.create');
    Route::post('/folders/{id}/tasks/create', [TodoController::class, 'create']);

    //タスク編集
    Route::get('/folders/{id}/tasks/{task_id}/edit', [TodoController::class, 'showEditForm'])->name('tasks.edit');
    Route::post('/folders/{id}/tasks/{task_id}/edit', [TodoController::class, 'edit']);

});


