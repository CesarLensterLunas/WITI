<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashbaordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'Authlogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset{token}', [AuthController::class, 'PostReset']);




Route::group(['middleware'=>'admin'], function(){
    Route::get('admin/dashboard', [DashbaordController::class, 'dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);    
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/Delete/{id}', [AdminController::class, 'Delete']);


    //class url
    Route::get('admin/class/list', [ClassController::class, 'list']);
    Route::get('admin/class/add', [ClassController::class, 'add']);
    Route::post('admin/class/add', [ClassController::class, 'insert']);
    Route::get('admin/class/edit/{id}', [ClassController::class, 'edit']);    
    Route::post('admin/class/edit/{id}', [ClassController::class, 'update']);
    Route::get('admin/class/Delete/{id}', [ClassController::class, 'Delete']);

   
 //subject url
 Route::get('admin/subject/list', [SubjectController::class, 'list']);
 Route::get('admin/subject/add', [SubjectController::class, 'add']);
 Route::post('admin/subject/add', [SubjectController::class, 'insert']);
 Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit']);    
 Route::post('admin/subject/edit/{id}', [SubjectController::class, 'update']);
 Route::get('admin/subject/Delete/{id}', [SubjectController::class, 'Delete']);

 //assign_subject
 Route::get('admin/assign_subject/list', [ClassSubjectController::class, 'list']);
 Route::get('admin/assign_subject/add', [ClassSubjectController::class, 'add']);
 Route::post('admin/assign_subject/add', [ClassSubjectController::class, 'insert']);
 Route::get('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'edit']);    
 Route::post('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'update']);
 Route::get('admin/assign_subject/Delete/{id}', [ClassSubjectController::class, 'Delete']);
 Route::get('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'edit_single']);    
 Route::post('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'update_single']);

 



});

Route::group(['middleware'=>'teacher'], function(){
    Route::get('teacher/dashboard', [DashbaordController::class, 'dashboard']);
   
});

Route::group(['middleware'=>'student'], function(){
    Route::get('student/dashboard', [DashbaordController::class, 'dashboard']);
});

Route::group(['middleware'=>'parent'], function(){
    Route::get('parent/dashboard', [DashbaordController::class, 'dashboard']);
});

