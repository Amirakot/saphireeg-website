<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\WebsiteController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WebsiteController::class,'index'])->name('welcome');
Route::get('/about-level-1/{id}', [WebsiteController::class,'showaboutlevel1'])->name('showaboutlevel1');
Route::get('/service-level-1/{id}', [WebsiteController::class,'showservicelevel1'])->name('servicelevel1');
Route::get('/all-future', [WebsiteController::class,'showfuture'])->name('showfuturelevel1');
Route::get('/all-fleet', [WebsiteController::class,'showfleet'])->name('showfleet');
Route::get('/vision-level-1/{id}', [WebsiteController::class,'showvision'])->name('showvision');
Route::get('/all-gallery', [WebsiteController::class,'showgallery'])->name('showgallery');
Route::get('/all-news', [WebsiteController::class,'shownews'])->name('shownews');
Route::get('/newas-detlis/{eventId}', [WebsiteController::class,'showNewsdetalis'])->name('showNewsdetalis');
Route::get('/all-contact-us', [WebsiteController::class,'showcontact'])->name('showcontact');
Route::get('/career', [WebsiteController::class,'showcareer'])->name('showcareer');
// showcorevalue
Route::get('/showcorevalue', [WebsiteController::class,'showcorevalue'])->name('showcorevalue');
