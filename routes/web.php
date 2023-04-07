<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

use App\Models\Category;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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
// Route::get('/', function () {
//     $product = Category::find(1)->products()->get();
//     foreach($product as $p)
//     {
//         dd($p);
//     }
// });



//Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

//Categories
Route::resource('categories', CategoryController::class);

//Products
Route::resource('products', ProductController::class);

//Offers
Route::resource('offers', OfferController::class);

//Customers
// Route::resource('customers', CustomerController::class);

//Admins
// Route::resource('admins', AdminController::class);

//Receipts
// Route::resource('receipts', ReceiptController::class);

//Contact
// Route::resource('contact', ContactController::class);



// Route::get('/categories',[CategoryController::class, 'index'])->name('indexCategory');
// Route::post('/addCategory',[CategoryController::class, 'store'])->name('addCategory');
// Route::put('/update',[CategoryController::class, 'update'])->name('updateCategory');
// Route::delete('/destroy',[CategoryController::class, 'destroy'])->name('destroyCategory');
// Route::post('/searchCategory',[CategoryController::class, 'search'])->name('searchCategory');


// Cutomers
Route::get('/customers', function () {
    return view('pages.admin-panel.customers.customers');
});
Route::get('/add_customer', function () {
    return view('pages.admin-panel.customers.add_customer');
});
Route::get('/edit_customer', function () {
    return view('pages.admin-panel.customers.edit_customer');
});
Route::get('/delete_customer', function () {
    return view('pages.admin-panel.customers.delete_customer');
});


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



// Route::get('/stored_carts', function () {
//     return view('pages.admin-panel.stored_carts.stored_carts');
// });

// Route::get('/used_carts', function () {
//     return view('pages.admin-panel.used_carts.used_carts');
// });


// Route::get('/', function () {
//     return view('pages.admin-panel.dashboard.dashboard');
// });


Route::get('/profile', function () {
    return view('pages.admin-panel.profile.profile');
});

Route::get('/notification', function () {
    return view('pages.admin-panel.notification_profile.notification');
});

// Route::get('/purchase', function () {
//     return view('pages.admin-panel.purchase.purchase');
// });


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

Route::get('/log_in', function () {
    return view('pages.login-register.login');
});

Route::get('/sign_up', function () {
    return view('pages.login-register.sign_up');
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



Route::get('/home',[App\Http\Controller::class,'index'])->name('home');