<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\FeedbackController;
use App\Http\Controllers\API\NoteController;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ReceiptController;
use App\Http\Controllers\API\SignupController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::post('/logout', [SignupController::class, 'logout']);


});
//products
Route::get('/products/{id}',[ProductController::class,'products']);
Route::get('/products/offers',[ProductController::class,'offers']);
Route::post('/products/insertFavorite',[ProductController::class,'insertFavoriteProduct']);
Route::post('/products/deleteFavorite',[ProductController::class,'deleteFavoriteProduct']);
Route::get('/products/favouriteProducts/{id}',[ProductController::class,'favouriteProducts']);

//categories
Route::get('/categories',[CategoryController::class,'categories']);
Route::get('/categoryProducts/{id}',[CategoryController::class,'categoryProducts']);
// receipts
Route::get('/customerReceipts/{id}',[ ReceiptController::class, 'allReceipts']);
Route::get('/receiptItems/{id}',[ ReceiptController::class, 'receiptItems']);
//registeration 
Route::post('/register', [SignupController::class, 'register']);
Route::post('/login', [SignupController::class, 'login']);
Route::post('/updateProfile', [SignupController::class, 'updateProfile']);
Route::post('/deleteAccount', [SignupController::class, 'deleteAccount']);
  
// notes
Route::get('/notes/{id}', [NoteController::class, 'notes']);
Route::post('/notes/delete',[NoteController::class,'deleteNote']);
Route::post('/notes/insert',[NoteController::class,'insertNote']);
Route::post('notes/deleteAll',[NoteController::class,'deleteAllNotes']);
Route::post('/notes/update',[NoteController::class,'updateNote']);
// contact 
Route::post('/contacts/add',[FeedbackController::class,'Add']);
//points and accounts
Route::get('/points/{id}', [CustomerController::class, 'customerPoints']);
Route::post('/accounts/delete', [CustomerController::class, 'deleteRelatedAccount']);
Route::get('/accounts/{id}', [CustomerController::class, 'relatedAccounts']);
Route::post('/accounts/add', [CustomerController::class, 'addRelatedAccount']);

