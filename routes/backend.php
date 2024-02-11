<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// AboutController
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutHeaderController;
use App\Http\Controllers\AboutLevel1Controller;
use App\Http\Controllers\AboutLevel2Controller;
use App\Http\Controllers\CoreVsionController;
use App\Http\Controllers\FleetController;
use App\Http\Controllers\FleetLevelController;
use App\Http\Controllers\FutureController;
use App\Http\Controllers\FutureLevelController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceLevel1Controller;
use App\Http\Controllers\ServiceLevel2Controller;
use App\Http\Controllers\StasticController;
use App\Http\Controllers\VisionController;
use App\Http\Controllers\Visionlevel1Controller;
use App\Http\Controllers\Visionlevel2Controller;
use App\Models\VisionLevel1;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CoreVisionController;
use App\Http\Controllers\ServiceHeaderController;
use App\Http\Controllers\VisionHeaderController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::resource('/slider', SliderController::class);
Route::resource('/about', AboutController::class);
Route::resource('/aboutlevel1', AboutLevel1Controller::class);
Route::resource('/aboutlevel2', AboutLevel2Controller::class);
Route::resource('/service', ServiceController::class);
// servicelevel1
Route::resource('/servicelevel1', ServiceLevel1Controller::class);
// servicelevel2
Route::resource('/servicelevel2', ServiceLevel2Controller::class);
Route::resource('/future', FutureController::class);
Route::resource('/futurelevel1', FutureLevelController::class);

Route::resource('/new', NewsController::class);
Route::resource('/visionlevel1', Visionlevel1Controller::class);
Route::resource('/visionlevel2', Visionlevel2Controller::class);
Route::resource('/vision', VisionController::class);
Route::resource('/gallery', GalleryController::class);
Route::resource('/stastic', StasticController::class);
Route::resource('/fleet', FleetController::class);
Route::resource('/fleetlevel1', FleetLevelController::class);
// corevision
Route::resource('/corevision', CoreVisionController::class);
Route::resource('/contact', ContactController::class);
// aboutheaderimage
Route::resource('/aboutheaderimage', AboutHeaderController::class);
Route::resource('/serviceheaderimage', ServiceHeaderController::class);
Route::resource('/visionheaderimage',VisionHeaderController ::class);


});

require __DIR__.'/auth.php';
