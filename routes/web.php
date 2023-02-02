<?php
use App\Http\Controllers\Back\LoginController;
use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\Back\BrtaController;
use App\Http\Controllers\Back\BrtabookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
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


// Route::get('/', function () {

//     return view('welcome');

// });
// =====================EMAIL VERIFICATION =====================
Route::get('/', [AuthController::class, 'index'])->name('admin.login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('admin.register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('admin.register.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
  
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
    Route::resource('adminuser', AdminController::class); 
    Route::get('/roles', [PermissionController::class,'Permission']);
    Route::resource('brta_status', BrtaController::class); 
    Route::resource('brta_booking_status', BrtabookingController::class); 

});





Route::group(['middleware' => 'role:admin'], function() {

    Route::get('/user', function() {
        //return 'Welcome...!!';
        $user = \Auth::user();
        $role = Role::where('slug','admin')->first();
        
        //dd($role);
        //dd($user->role);
       return 'Welcome...!!';       
    });
 
 });


