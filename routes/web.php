<?php


//Admin Route Controller List

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\DailyInvoiceController;
use App\Http\Controllers\Admin\ProductController;


//Users Route Controller List
use App\Http\Controllers\Users\UsersHomeController;
//Default Route Controller List
use App\Http\Controllers\DefaultController;


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
  Route::put("status/update",[DefaultController::class,"StatusUpdate"])->name("status.update");
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
            //Customers Resource Route Start
            Route::resource('customers', CustomersController::class)->shallow();
            //Customers Resource Route End
            //Invoice Resource Route Start
            Route::get("/invoice/list",[DailyInvoiceController::class,"list"])->name("invoice.list");
            
           Route::resource('invoice', DailyInvoiceController::class)
           ->shallow();
           //Invoice Resource Route End
           //Product Resource Route Start
           Route::resource("product",ProductController::class)->shallow();
            //Product Resource Route End
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
