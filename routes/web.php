<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::group([
    'prefix' => 'post'
],function(){
    
    Route::get('/',[PostController::class,'index']);
    Route::get('show/{id}',[PostController::class,'show']);
    

    Route::group([
        'middleware' => 'role:writer'
    ],function(){

        Route::get('biding',[PostController::class,'biding']);
        Route::get('published',[PostController::class,'published']);
        Route::get('unpublished',[PostController::class,'unpublished']);


        Route::get('edit/{id}',[PostController::class,'edit']);
        Route::post('edit',[PostController::class,'update']);


        Route::get('create',[PostController::class,'create']);
        Route::post('create',[PostController::class,'store']);
        
        Route::post('delete/{id}',[PostController::class,'destroy']);

    });



});


Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth','role:admin']
],function(){
    Route::get('/',[AdminController::class,'new_posts']);
    Route::get('new-posts',[AdminController::class,'new_posts']);
    Route::get('published-posts',[AdminController::class,'published_posts']);
    Route::get('unpublished-posts',[AdminController::class,'unpublished_posts']);

    Route::get('users',[AdminController::class,'users']);

    Route::post('publish-post',[AdminController::class,'publish']);
    Route::post('unpublish-post',[AdminController::class,'unpublish']);
});