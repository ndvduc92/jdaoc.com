<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\GiftcodeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\GuildController;
use App\Http\Controllers\WarController;
use App\Http\Controllers\ManagerSpinController;

use App\Http\Controllers\WheelController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\ConfigController;
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

Route::get('/dang-nhap', [HomeController::class, 'signin'])->name("login");

Route::post('/dang-nhap', [HomeController::class, 'signinPost']);


Route::group(["middleware" => "auth"], function () {
    Route::get('/', [HomeController::class, 'home']);
    Route::get('/logout', function() {
		Auth::logout();
		return redirect("/dang-nhap");
	});

	Route::group(["prefix" => "users"], function () {
		Route::get('/', [UserController::class, 'index'])->name("users");
		Route::get('/{id}/edit', [UserController::class, 'edit']);
		Route::post('/{id}/edit', [UserController::class, 'update']);
	});

	Route::group(["prefix" => "chars"], function () {
		Route::get('/', [UserController::class, 'chars'])->name("chars");
		Route::get('/{id}/edit', [UserController::class, 'edit']);
		Route::post('/{id}/edit', [UserController::class, 'update']);
		Route::post('/{id}/update_name', [UserController::class, 'updateName']);
		Route::get('/{id}/delete', [UserController::class, 'deleteChar']);
	});

	Route::group(["prefix" => "promotions"], function () {
		Route::get('/', [PromotionController::class, 'index']);
		Route::get('/add', [PromotionController::class, 'create']);
		Route::post('/add', [PromotionController::class, 'store']);
	});

	Route::group(["prefix" => "giftcodes"], function () {
		Route::get('/', [GiftcodeController::class, 'index']);
		Route::get('/add', [GiftcodeController::class, 'create']);

		Route::get('/{id}/items', [GiftcodeController::class, 'editItems']);
		Route::post('/{id}/update', [GiftcodeController::class, 'update']);
		Route::post('/{id}/items', [GiftcodeController::class, 'updateItems']);
		Route::post('/add', [GiftcodeController::class, 'store']);

		Route::get('/{id}/accounts', [GiftcodeController::class, 'editAccounts']);
		Route::post('/{id}/update', [GiftcodeController::class, 'update']);
		Route::post('/{id}/accounts', [GiftcodeController::class, 'updateAccounts']);

		Route::get('/{id}/accounts/{user_id}/delete', [GiftcodeController::class, 'deleteAccount']);
	});

	Route::group(["prefix" => "shops"], function () {
		Route::get('/', [ShopController::class, 'index']);
		Route::get('/add', [ShopController::class, 'create']);
		Route::post('/add', [ShopController::class, 'store']);
		Route::get('/{id}/edit', [ShopController::class, 'edit']);
		Route::post('/{id}/edit', [ShopController::class, 'update']);
	});

	Route::group(["prefix" => "guilds"], function () {
		Route::get('/', [GuildController::class, 'index']);
		Route::get('/add', [GuildController::class, 'create']);
		Route::post('/add', [GuildController::class, 'store']);
		Route::get('/{id}/edit', [GuildController::class, 'edit']);
		Route::post('/{id}/edit', [GuildController::class, 'update']);
	});

	Route::group(["prefix" => "posts"], function () {
		Route::get('/', [PostController::class, 'index']);
		Route::get('/add', [PostController::class, 'create']);
		Route::post('/add', [PostController::class, 'store']);
		Route::get('/{id}/edit', [PostController::class, 'edit']);
		Route::post('/{id}/edit', [PostController::class, 'update']);
		Route::get('/{id}/delete', [PostController::class, 'destroy']);
	});

	Route::group(["prefix" => "deposits"], function () {
		Route::get('/', [DepositController::class, 'index']);
		Route::get('/add', [DepositController::class, 'create']);
		Route::post('/add', [DepositController::class, 'store']);
		Route::get('/{id}/approve', [DepositController::class, 'store']);
	});

	Route::group(["prefix" => "mail"], function () {
		Route::get('/', [MailController::class, 'index']);
		Route::get('/add', [MailController::class, 'create']);
		Route::post('/add', [MailController::class, 'store']);
		Route::get('/add_fast', [MailController::class, 'createFast']);
		Route::post('/add_fast', [MailController::class, 'storeFast']);
		Route::get('/add_all', [MailController::class, 'createAll']);
		Route::post('/add_all', [MailController::class, 'storeAll']);
	});

	Route::get('/revenue', [DepositController::class, 'revenue']);
	Route::get('/war', [WarController::class, 'getWar']);
	Route::post('/war', [WarController::class, 'postWar']);

	Route::post('/upload/image', [PostController::class, 'upload'])->name("image.upload");

	Route::get('/remote', [HomeController::class, 'ssh']);

	Route::resource('manager-spins', ManagerSpinController::class);


	Route::group(["prefix" => "wheels"], function () {
		Route::get('/', [WheelController::class, 'index']);
		Route::get('/add', [WheelController::class, 'create']);
		Route::post('/add', [WheelController::class, 'store']);
		Route::post('/{id}/update', [WheelController::class, 'update']);
		Route::get('/{id}/items', [WheelController::class, 'editItems']);
		Route::post('/{id}/items', [WheelController::class, 'updateItems']);
	});

	Route::group(["prefix" => "items"], function () {
		Route::get('/', [ItemController::class, 'index']);
		Route::get('/search', [ItemController::class, 'search']);
	});

	Route::group(["prefix" => "trades"], function () {
		Route::get('/', [TradeController::class, 'index']);
	});
	
	Route::get('/tools', [ConfigController::class, 'index']);
});


