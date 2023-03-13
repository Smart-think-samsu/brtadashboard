<?php
use App\Http\Controllers\Back\LoginController;
use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\Back\BrtaController;
use App\Http\Controllers\Back\BrtabookingController;
use App\Http\Controllers\Back\RoleController;
use App\Http\Controllers\Back\PermissionController;
use App\Http\Controllers\Back\OperatorController;
use App\Http\Controllers\Back\EpassportController;
use App\Http\Controllers\Back\EpassreceivedController;
use App\Http\Controllers\Back\ReportController;
use App\Http\Controllers\Back\InsuranceController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsVerifyEmail;
use App\Models\Role;
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

// ================================ BACKEND ROUTE ==================================
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return "All Cache Clear Successful";
});

// Route::get('/', function () {

//     return view('welcome');

// });
// =====================EMAIL VERIFICATION =====================
Route::get('/', [AuthController::class, 'index'])->name('admin.login');
Route::post('/post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('/registration', [AuthController::class, 'registration'])->name('admin.register');
Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('admin.register.post'); 
// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
  
/* New Added Routes */
Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware(['auth','is_verify_email']); 
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify'); 
// ========================= EMAIL VERIFICATION END ========================



// Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//==========================FORGET PASSWORD ROUTE ===========================
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::group(['middleware' => ['auth']], function() { 
    Route::resource('/adminuser', AdminController::class);
    Route::delete('/adminuser/delete/{id}', [AdminController::class,'destroy']);     
    Route::resource('/brta_status', BrtaController::class); 
    Route::delete('/brta_status/delete/{id}', [BrtaController::class,'destroy']); 

    Route::get('/brta_status_back', [BrtaController::class,'backindex'])->name('brta_status_back');
    Route::get('/users/{id}', [BrtaController::class,'show'])->name('users.show');
    
    Route::resource('/brta_booking_status', BrtabookingController::class); 

    // ================================Report Controller ==================================================
    Route::get('brtabooking/report', [ReportController::class,'brtabookingreport'])->name('brtabooking.report');
    Route::get('/brtabooking/datereport/{date}', [ReportController::class,'brtabookindategreport'])->name('brtabooking.datereport');
    
    // ============================Epassport Route ==================================
    Route::resource('/epassport_show', EpassportController::class);
    Route::resource('/epass_received', EpassreceivedController::class); 
    
    Route::get('insurance/report', [InsuranceController::class,'report'])->name('insurance.report');
    Route::get('/insurance/datereport/{date}', [InsuranceController::class,'datereport'])->name('insurance.datereport');
    

});

Route::group(['middleware' => ['auth']], function() {     
    Route::resource('/adminuser', AdminController::class);
    Route::get('/epassport', [EpassportController::class, 'index'])->name('epassport.index');
    Route::resource('/operator', OperatorController::class);
    Route::get('role-permission/{id}',[PermissionController::class,'index'])->name('role-permission');
    Route::post('store/{id}',[PermissionController::class,'store'])->name('role-store');


});


Route::group(['middleware' =>'auth'], function() {
    
    Route::resource('role_add', RoleController::class);
    

    // Route::get('/user', function() {
        
    //     $user = \Auth::user();
    //     if($user->hasrole('admin')){
    //         dd('yes');
    //     }    
        
    //     //dd($role);
    //     //dd($user->role);
    //    return 'Welcome...!!';       
    // });
 
 });


