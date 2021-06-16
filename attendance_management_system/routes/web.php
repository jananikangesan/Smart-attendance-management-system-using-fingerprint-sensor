<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\User\UserpageController;
//use App\Http\Middleware\IsLecturers;
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
})->name('welcome');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admindashboard')->middleware('role');

Route::get('/change-password', 'User\ChangePasswordController@index');
Route::post('/change-password', 'User\ChangePasswordController@store')->name('change.password');

Route::get('/profile', 'LecturerPageController@profile')->name('profile');
Route::post('/edit-profile', 'LecturerPageController@edit')->name('edit-profile');
Route::post('/update-profile/{id}', 'LecturerPageController@update')->name('update-profile');

Route::get('/see', 'User\UserpageController@seecourse');
Route::get('/seeall', 'User\UserpageController@seeallcourses');
Route::any('/seeatt', 'User\UserpageController@seeatt');
Route::any('/att', 'User\UserpageController@att');
Route::any('/weeklyatt', 'User\UserpageController@weeklyatt');
//Route::get('/see',[CourseController::class ,'create']);

Route::group(['middleware' => ['auth', 'role']], function() {

  Route::get('/student', function () {
    return view('students.studentregister');
  });
  
  Route::get('/course',[CourseController::class ,'create']);
  
  Route::get('/lecturer', function () {
    return view('lecturers.lecturerregister');
  });
  
  Route::get('/admin', function () {
    return view('admins.adminregister');
  });

  Route::get('/level3', function () {
    return view('level_3.level3');
  });

  Route::get('/semester',[SemesterController::class,'index']);
  Route::post('/seme-update',[SemesterController::class,'update']);

  Route::get('/level/update',[LevelController::class,'index']);
  Route::get('/level-4/update',[LevelController::class,'updatefour']);
  Route::post('/level-3/update',[LevelController::class,'updatethree']);
  Route::post('/level-2/update',[LevelController::class,'updatetwo']);
  Route::get('/level-1/update',[LevelController::class,'updateone']);

  Route::get('/admin/home',[DashboardController::class,'displycourse'])->name('admindashboard')->middleware('role');

  Route::any('/tables/users', 'Auth\UserController@index');
  Route::get('/user/create', 'Auth\UserController@create');
  Route::post('/user/store', 'Auth\UserController@store')->name('user.register');
  Route::post('/admin/store', 'Auth\UserController@adminstore')->name('admin.register');
  Route::get('/user/edit/{id}', 'Auth\UserController@edit')->name('edit');
  Route::patch('/user/update/{id}', 'Auth\UserController@update')->name('update');
  Route::delete('/user/delete/{id}', 'Auth\UserController@destroy')->name('delete');

  Route::any('/tables/lecturers',[LecturerController::class,'index'])->name('lecturer_view');
  Route::post('/lecturer/store',[LecturerController::class,'store']);
  Route::get('/lecturer/edit/{id}', [LecturerController::class, 'edit']) ->name('lecturer_edit');
  Route::patch('/lecturer/update/{id}', [LecturerController::class, 'update']) ->name('lecturer_update');
  Route::delete('/lecturer/delete/{id}', [LecturerController::class, 'destroy']) ->name('lecturer_delete');

  Route::any('/tables/courses',[CourseController::class,'index']);
  Route::post('/course/store',[CourseController::class,'store']);
  Route::get('/course/edit/{id}', [CourseController::class, 'edit']) ->name('course_edit');
  Route::patch('/course/update/{id}', [CourseController::class, 'update']) ->name('course_update');
  Route::delete('/course/delete/{id}', [CourseController::class, 'destroy']) ->name('course_delete');

  Route::any('/tables/students',[StudentController::class,'index']);
  Route::post('/student/store',[StudentController::class,'store']);
  Route::get('/student/edit/{id}', [StudentController::class, 'edit']) ->name('student_edit');
  Route::patch('/student/update/{id}', [StudentController::class, 'update']) ->name('student_update');
  Route::delete('/student/delete/{id}', [StudentController::class, 'destroy']) ->name('student_delete');

  /* level - 3S */
  Route::get('/level3s', 'S3courseController@index'); /*get all 3s subject of perticular semester layout */
  Route::any('/attendance', 'S3courseController@attendance')->name('attendance'); /*preparing perticular 3s subject attendance adding absent or peresent */
  Route::any('/weeklyreport', 'S3courseController@weeklyreport')->name('weeklyreport');/*preparing weekly_persentage_report of perticular 3s subject*/
  Route::any('/finalreport', 'S3courseController@finalreport')->name('finalreport');/*preparing final_persentage_report of perticular 3s subject*/
 // Route::get('/finalreport/downloadpdf', 'S3courseController@finalreport_download')->name('finalreport-downloadpdf');
 // Route::get('/downloadpdf', 'S3courseController@downloadPDF');

  /*get all 3s subject final_report and weekly_final_reporty*/
  Route::any('/3s/finalreport', 'S3courseController@finalreport3s');
  Route::any('/3s/weeklyreport', 'S3courseController@weeklyreport3s');

  /* level - 3G */
  Route::get('/level3g', 'G3courseController@index');
  Route::any('/attendance3g', 'G3courseController@attendance')->name('attendance');
  Route::any('/weeklyreport3g', 'G3courseController@weeklyreport')->name('weeklyreport3g');
  Route::any('/finalreport3g', 'G3courseController@finalreport')->name('finalreport3g');

  /*get all 3g subject final_report and weekly_final_reporty*/ 
  Route::any('/3g/finalreport', 'G3courseController@finalreport3g');
  Route::any('/3g/weeklyreport', 'G3courseController@weeklyreport3g');

  /* level - 3M */
  Route::get('/level3m', 'M3courseController@index');
  Route::any('/attendance3m', 'M3courseController@attendance')->name('attendance');
  Route::any('/weeklyreport3m', 'M3courseController@weeklyreport')->name('weeklyreport3m');
  Route::any('/finalreport3m', 'M3courseController@finalreport')->name('finalreport3m');

  /*get all 3m subject final_report and weekly_final_reporty*/
  Route::any('/3m/finalreport', 'M3courseController@finalreport3m');
  Route::any('/3m/weeklyreport', 'M3courseController@weeklyreport3m');
  
  /*every 3S, 3G, 3M indiviual subject final Percentage Report pdfview & download */
  Route::any('/report3s', 'S3courseController@pdfmaker');
  Route::any('/report3g', 'G3courseController@pdfmaker');
  Route::any('/report3m', 'M3courseController@pdfmaker');

  /*All 3S subject, 3G subject, 3M subject final Percentage Report pdfview & download */
  Route::any('/finalpdf3s', 'S3courseController@pdfmaker3s');
  Route::any('/finalpdf3g', 'G3courseController@pdfmaker3g');
  Route::any('/finalpdf3m', 'M3courseController@pdfmaker3m');



     Route::group([
          'prefix' => 'attendance_3_s__students',
     ], function () {
          Route::get('/', 'Attendance3SStudentsController@index')
               ->name('attendance_3_s__students.attendance_3_s__student.index');
          Route::get('/create','Attendance3SStudentsController@create')
               ->name('attendance_3_s__students.attendance_3_s__student.create');
          Route::get('/show/{attendance3SStudent}','Attendance3SStudentsController@show')
               ->name('attendance_3_s__students.attendance_3_s__student.show')->where('id', '[0-9]+');
          Route::get('/{attendance3SStudent}/edit','Attendance3SStudentsController@edit')
               ->name('attendance_3_s__students.attendance_3_s__student.edit')->where('id', '[0-9]+');
          Route::post('/', 'Attendance3SStudentsController@store')
               ->name('attendance_3_s__students.attendance_3_s__student.store');
          Route::put('attendance_3_s__student/{attendance3SStudent}', 'Attendance3SStudentsController@update')
               ->name('attendance_3_s__students.attendance_3_s__student.update')->where('id', '[0-9]+');
          Route::delete('/attendance_3_s__student/{attendance3SStudent}','Attendance3SStudentsController@destroy')
               ->name('attendance_3_s__students.attendance_3_s__student.destroy')->where('id', '[0-9]+');
     });
 
     Route::group([
          'prefix' => 'attendance_3_g__students',
     ], function () {
          Route::get('/', 'Attendance3GStudentsController@index')
               ->name('attendance_3_g__students.attendance_3_g__student.index');
          Route::get('/create','Attendance3GStudentsController@create')
               ->name('attendance_3_g__students.attendance_3_g__student.create');
          Route::get('/show/{attendance3GStudent}','Attendance3GStudentsController@show')
               ->name('attendance_3_g__students.attendance_3_g__student.show')->where('id', '[0-9]+');
          Route::get('/{attendance3GStudent}/edit','Attendance3GStudentsController@edit')
               ->name('attendance_3_g__students.attendance_3_g__student.edit')->where('id', '[0-9]+');
          Route::post('/', 'Attendance3GStudentsController@store')
               ->name('attendance_3_g__students.attendance_3_g__student.store');
          Route::put('attendance_3_g__student/{attendance3GStudent}', 'Attendance3GStudentsController@update')
               ->name('attendance_3_g__students.attendance_3_g__student.update')->where('id', '[0-9]+');
          Route::delete('/attendance_3_g__student/{attendance3GStudent}','Attendance3GStudentsController@destroy')
               ->name('attendance_3_g__students.attendance_3_g__student.destroy')->where('id', '[0-9]+');
     });
 
     Route::group([
          'prefix' => 'attendance_3_m__students',
     ], function () {
          Route::get('/', 'Attendance3MStudentsController@index')
               ->name('attendance_3_m__students.attendance_3_m__student.index');
          Route::get('/create','Attendance3MStudentsController@create')
               ->name('attendance_3_m__students.attendance_3_m__student.create');
          Route::get('/show/{attendance3MStudent}','Attendance3MStudentsController@show')
               ->name('attendance_3_m__students.attendance_3_m__student.show')->where('id', '[0-9]+');
          Route::get('/{attendance3MStudent}/edit','Attendance3MStudentsController@edit')
               ->name('attendance_3_m__students.attendance_3_m__student.edit')->where('id', '[0-9]+');
          Route::post('/', 'Attendance3MStudentsController@store')
               ->name('attendance_3_m__students.attendance_3_m__student.store');
          Route::put('attendance_3_m__student/{attendance3MStudent}', 'Attendance3MStudentsController@update')
               ->name('attendance_3_m__students.attendance_3_m__student.update')->where('id', '[0-9]+');
          Route::delete('/attendance_3_m__student/{attendance3MStudent}','Attendance3MStudentsController@destroy')
               ->name('attendance_3_m__students.attendance_3_m__student.destroy')->where('id', '[0-9]+');
     });
  
//   Route::get('/level3s', function () {
//      return view('level_3.3scourse.3scourses');
//   });

//   Route::get('/course', function () {
//     return view('courses.courseregister');
//   });

//   Route::group(['middleware' => 'islecturers'], function () {
//   Route::get('/course', 'Course_LecturerController@lecturer_show')->name('lecturer_show');
//   });
});

