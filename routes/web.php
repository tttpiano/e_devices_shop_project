<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopDetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('/users/{id}', [CustomAuthController::class, 'show'])->name('show');
Route::get('pages', [CustomAuthController::class, 'phanTrang'])->name('abc');

Route::get('', [ProductController::class, 'showProduct'])->name('home');
Route::get('/shop', [ShopController::class, 'show'])->name('shop');
Route::get('/search', [SearchProductController::class, 'search'])->name('search');
Route::get('/shopdetail/{id}', [ShopDetailController::class, 'showId'])->name('shopId');


Route::post('/cart/add', [CartController::class, 'addCart'] )->name('cart.add');
Route::get('/cart/show', [CartController::class,'CartShow'])->name('cart.show');
Route::get('/cart/add/{id}', [CartController::class, 'deleteCart'] )->name('cart.delete');
Route::get('/cart/edit/{id}', [CartController::class, 'editCart'] )->name('cart.edit');
Route::post('/shopdetail/{id}', [ReviewController::class, 'store'])->name('ratings.store')->middleware('auth');
