<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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


// Admins
Route::get('/admins', function () {
    return view('pages.admin-panel.admins.admins');
});
Route::get('/add_admin', function () {
    return view('pages.admin-panel.admins.add_admin');
});
Route::get('/edit_admin', function () {
    return view('pages.admin-panel.admins.edit_admin');
});
Route::get('/delete_admin', function () {
    return view('pages.admin-panel.admins.delete_admin');
});



Route::get('/profile', function () {
    return view('pages.admin-panel.profile.profile');
});

Route::get('/notification', function () {
    return view('pages.admin-panel.notification_profile.notification');
});

Route::get('/receipts', function () {
    return view('pages.admin-panel.receipts.receipts');
});
Route::get('/delete_receipt', function () {
    return view('pages.admin-panel.receipts.delete_receipt');
});

Route::get('/contact', function () {
    return view('pages.admin-panel.contact.contact');
});
Route::get('/delete_contact', function () {
    return view('pages.admin-panel.contact.delete_contact');
});

// Route::get('/log_in', function () {
//     return view('pages.login-register.login');
// });



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
// Route::get('/sign_up', [RegisterController::class, 'index']);
// Route::post('/sign_up', [RegisterController::class, 'register'])->name('sign_up');



Route::get('/home',[App\Http\Controller::class,'index'])->name('home');
