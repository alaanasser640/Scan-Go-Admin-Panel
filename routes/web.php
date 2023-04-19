<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReceiptController;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;





//Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/landing', [DashboardController::class, 'landing'])->name('landing');

//Categories
Route::resource('categories', CategoryController::class);

//Products
Route::resource('products', ProductController::class);

//Offers
Route::resource('offers', OfferController::class);

//Contact
Route::resource('contacts', ContactController::class);

//Admin
Route::resource('admins', AdminController::class);

// Cutomers
Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
Route::get('/add_customer', function () {
    return view('pages.admin-panel.customers.add_customer');
});
Route::get('/edit_customer', function () {
    return view('pages.admin-panel.customers.edit_customer');
});
Route::get('/delete_customer/{id}', [CustomerController::class, 'delete'])->name('delete_customer');
Route::post('/delete_customer/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');


//Notifications
Route::resource('notifications', NotificationController:: class);
Route::get('read_notification/{id}',[NotificationController::class, 'read_notification'])->name('read_notification');
Route::get('read_all_notification',[NotificationController::class, 'read_all_notification'])->name('read_all_notification');
Route::post('delete_all_notification',[NotificationController::class, 'delete_all_notification'])->name('delete_all_notification');



// Admins
// Route::get('/admins', function () {
//     return view('pages.admin-panel.admins.admins');
// });
// Route::get('/add_admin', function () {
//     return view('pages.admin-panel.admins.add_admin');
// });
// Route::get('/edit_admin', function () {
//     return view('pages.admin-panel.admins.edit_admin');
// });
// Route::get('/delete_admin', function () {
//     return view('pages.admin-panel.admins.delete_admin');
// });



Route::get('/profile', function () {
    return view('pages.admin-panel.profile.profile');
});

Route::get('/receipts', function () {
    return view('pages.admin-panel.receipts.receipts');
});
Route::get('/delete_receipt', function () {
    return view('pages.admin-panel.receipts.delete_receipt');
});

Route::get('/reset_password', function () {
    return view('pages.login-register.reset_password');
});

Route::get('/landing_page', function () {
    return view('pages.landing-page.landing');
});

Route::get('/error', function () {
    return view('pages.error-page.error');
});

// admins
Route::get('log_in', [RegisterController::class, 'index'])->name('login');
Route::post('custom-login', [RegisterController::class, 'customLogin'])->name('login.custom');
Route::get('/sign_up', [RegisterController::class, 'registration']);
Route::post('/sign_up', [RegisterController::class, 'register'])->name('sign_up');
Route::get('/sign-out', [RegisterController::class, 'signOut'])->name('signout');



//receipts
Route::resource('receipts', ReceiptController::class);
Route::get('showReceipt/{id}', [ReceiptController::class, 'showReceipt'])->name('showReceipt');
