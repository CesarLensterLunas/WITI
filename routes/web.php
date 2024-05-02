<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashbaordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AssignClassTeacherController;
use App\Http\Controllers\CommunicateController;

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
    if (Auth::check()) { // Check if user is logged in
        // Redirect based on user role
        if (Auth::user()->user_type == 1) {
            return redirect('admin/dashboard');
        } elseif (Auth::user()->user_type == 2) {
            return redirect('teacher/dashboard');
        } elseif (Auth::user()->user_type == 3) {
            return redirect('student/dashboard');
        } 
    }
    return view('landingPage'); // If not logged in, show landing page
});


// Route::get('/', [AuthController::class, 'login']);
Route::get('login', [AuthController::class, 'login']);
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
    //Teacher
    Route::get('admin/teacher/list', [TeacherController::class, 'list']); 
    Route::get('admin/teacher/add', [TeacherController::class, 'add']); 
    Route::post('admin/teacher/add', [TeacherController::class, 'insert']);
    Route::get('admin/teacher/edit/{id}', [TeacherController::class, 'edit']); 
    Route::post('admin/teacher/edit/{id}', [TeacherController::class, 'update']);
    Route::get('admin/teacher/delete/{id}', [TeacherController::class, 'delete']); 
    //student
    
    Route::get('admin/student/list', [StudentController::class, 'list']); 
    Route::get('admin/student/add', [StudentController::class, 'add']); 
    Route::post('admin/student/add', [StudentController::class, 'insert']);
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']); 
    Route::post('admin/student/edit/{id}', [StudentController::class, 'update']);
    Route::get('admin/student/delete/{id}', [StudentController::class, 'delete']);


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


 Route::get('admin/account', [UserController::class, 'MyAccount']);
 Route::post('admin/account', [UserController::class, 'UpdateMyAccountAdmin']);

 
Route::get('admin/assign_class_teacher/list', [AssignClassTeacherController::class, 'list']);
Route::get('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'add']);
Route::post('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'insert']);
Route::get('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'edit']);
Route::post('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'update']);
 Route::get('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'edit_single']);
 Route::post('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'update_single']);
 Route::get('admin/assign_class_teacher/Delete/{id}', [AssignClassTeacherController::class, 'Delete']);



//communicate
Route::get('admin/communicate/notice_board', [CommunicateController::class, 'NoticeBoard']);
Route::get('admin/communicate/notice_board/add', [CommunicateController::class, 'AddNoticeBoard']);
Route::post('admin/communicate/notice_board/add', [CommunicateController::class, 'InsertNoticeBoard']);
Route::get('admin/communicate/notice_board/edit/{id}', [CommunicateController::class, 'EditNoticeBoard']);
Route::post('admin/communicate/notice_board/edit/{id}', [CommunicateController::class, 'UpdateNoticeBoard']);
Route::get('admin/communicate/notice_board/delete/{id}', [CommunicateController::class, 'DeleteNoticeBoard']);

 //admin/change_password

 Route::get('admin/change_password', [UserController::class, 'change_password']);
 Route::post('admin/change_password', [UserController::class, 'update_change_password']);



});

Route::group(['middleware'=>'teacher'], function(){
    Route::get('teacher/dashboard', [DashbaordController::class, 'dashboard']);

    Route::get('teacher/change_password', [UserController::class, 'change_password']);
    Route::post('teacher/change_password', [UserController::class, 'update_change_password']);
    Route::get('teacher/account', [UserController::class, 'MyAccount']);
     Route::post('teacher/account', [UserController::class, 'UpdateMyAccount']);

     
   
     Route::post('teacher/my_student', [StudentController::class, 'MyStudent']);

   
     Route::get('teacher/my_class_subject', [AssignClassTeacherController::class, 'MyClassSubject']);

   
});

Route::group(['middleware'=>'student'], function(){
    Route::get('student/dashboard', [DashbaordController::class, 'dashboard']);
    
    Route::get('student/account', [UserController::class, 'MyAccount']);
    Route::post('student/account', [UserController::class, 'UpdateMyAccountStudent']);
    
    Route::get('student/my_subject', [SubjectController::class, 'MySubject']);


    Route::get('student/change_password', [UserController::class, 'change_password']);
    Route::post('student/change_password', [UserController::class, 'update_change_password']);
    Route::get('student/my_notice_board', [CommunicateController::class, 'MyNoticeBoardStudent']);
    

  
});

Route::group(['middleware'=>'parent'], function(){
    Route::get('parent/dashboard', [DashbaordController::class, 'dashboard']);

    Route::get('parent/change_password', [UserController::class, 'change_password']);
    Route::post('parent/change_password', [UserController::class, 'update_change_password']);
});

