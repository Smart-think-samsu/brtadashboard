Route::get('/login', [LoginController::class, 'create'])->name('admin.login.creare');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.submit');