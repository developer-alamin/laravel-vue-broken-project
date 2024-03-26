<?php



//Admin Route Controller List
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminIdController;

//Users Route Controller List
use App\Http\Controllers\Users\UsersHomeController;
//Auth Route Controller List
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;


use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});


Route::group(["middleware"=>"auth"],function(){


    Route::get("CheckRole",[RedirectAuthenticatedUsersController::class,"CheckRole"])->name("Auth.CheckRole");


   Route::group(['middleware' => 'checkRole:users'], function() {
       Route::prefix('users')->group(function () {
          Route::get("/",[UsersHomeController::class,"UsersHomePage"])->name("Users.Home.Page");
          
       });
    });

    //Admin Group Route List
    Route::group(['middleware' => 'checkRole:admin'], function() {
       Route::prefix('admin')->group(function () {
            Route::get("/dashboard",[AdminHomeController::class,"AdminHomePage"])->name("Admin.Home.Page");
            Route::get("student-id",[AdminIdController::class,"AdminStudentIdPage"])->name("Admin.Student.Id.Page");
        });
    });

});


/*Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
