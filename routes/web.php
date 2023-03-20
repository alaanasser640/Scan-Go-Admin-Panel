<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProductController;

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


Route::get('/', function () {
    return view('pages.admin-panel.dashboard.dashboard');
});


Route::get('/profile', function () {
    return view('pages.admin-panel.profile.profile');
});

Route::get('/notification', function () {
    return view('pages.admin-panel.notification_profile.notification');
});

Route::get('/purchase', function () {
    return view('pages.admin-panel.purchase.purchase');
});


//Categories
Route::get('/categories',[CategoryController::class, 'index'])->name('indexCategory');
Route::post('/addCategory',[CategoryController::class, 'store'])->name('addCategory');
Route::put('/update',[CategoryController::class, 'update'])->name('updateCategory');
Route::delete('/destroy',[CategoryController::class, 'destroy'])->name('destroyCategory');
Route::post('/searchCategory',[CategoryController::class, 'search'])->name('searchCategory');

Route::get('/add_category', function () {
    return view('pages.admin-panel.categories.add_category');
});
Route::get('/edit_category', function () {
    return view('pages.admin-panel.categories.edit_category');
});
Route::get('/delete_category', function () {
    return view('pages.admin-panel.categories.delete_category');
});

//Products
Route::get('/products',[ProductController::class, 'index'])->name('products');
Route::post('/addProduct',[ProductController::class, 'store'])->name('addProduct');
Route::put('/updateProduct',[ProductController::class, 'update'])->name('updateProduct');
Route::delete('/destroyProduct',[ProductController::class, 'destroy'])->name('destroyProduct');
Route::post('/searchProduct',[ProductController::class, 'search'])->name('searchProduct');

Route::get('/add_product', function () {
    return view('pages.admin-panel.products.add_product');
});
Route::get('/edit_product', function () {
    return view('pages.admin-panel.products.edit_product');
});
Route::get('/delete_product', function () {
    return view('pages.admin-panel.products.delete_product');
});


//Offers
Route::get('/offers',[OfferController::class, 'index'])->name('offers');
Route::post('/addOffer',[OfferController::class, 'store'])->name('addOffer');
Route::put('/updateOffer',[OfferController::class, 'update'])->name('updateOffer');
Route::delete('/destroyOffer',[OfferController::class, 'destroy'])->name('destroyOffer');
Route::post('/searchOffer',[OfferController::class, 'search'])->name('searchOffer');
Route::post('/expired',[OfferController::class, 'expired'])->name('expired');

Route::get('/add_offer', function () {
    return view('pages.admin-panel.offers.add_offer');
});
Route::get('/edit_offer', function () {
    return view('pages.admin-panel.offers.edit_offer');
});
Route::get('/delete_offer', function () {
    return view('pages.admin-panel.offers.delete_offer');
});



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



Route::get('/stored_carts', function () {
    return view('pages.admin-panel.stored_carts.stored_carts');
});

Route::get('/used_carts', function () {
    return view('pages.admin-panel.used_carts.used_carts');
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