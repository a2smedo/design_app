<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\CatController;
use App\Http\Controllers\Web\Admin\HomeController;
use App\Http\Controllers\Web\Admin\UserController;
use App\Http\Controllers\Web\Admin\AdminController;
use App\Http\Controllers\Web\Admin\OrderController;
use App\Http\Controllers\Web\Admin\DesignController;
use App\Http\Controllers\Web\Admin\MessageController;
use App\Http\Controllers\Web\Admin\PackageController;
use App\Http\Controllers\Web\Admin\CompetitionController;
use App\Http\Controllers\Web\Admin\NotificationController;

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

Route::get('/', function () {
    return redirect(route('login'));
});

//Admin-Dashboard
Route::prefix('dashboard')->middleware(['auth', 'enterDashboard'])->group(function () {

    //home
    Route::get('/', [HomeController::class, 'index']);


    //Categories
    Route::get('/cats', [CatController::class, 'index']);
    Route::post('/cats/store', [CatController::class, 'store']);
    Route::post('/cats/update', [CatController::class, 'update']);
    Route::get('/cats/delete/{cat}', [CatController::class, 'delete']);
    Route::get('/cats/toggle/{cat}', [CatController::class, 'toggle']);


    //designs
    Route::get('/designs', [DesignController::class, 'index']);
    Route::get('/designs/show/{design}', [DesignController::class, 'show']);
    Route::get('/designs/create', [DesignController::class, 'create']);
    Route::post('/designs/store', [DesignController::class, 'store']);
    Route::get('/designs/edit/{design}', [DesignController::class, 'edit']);
    Route::post('/designs/update/{design}', [DesignController::class, 'update']);
    Route::get('/designs/delete/{design}', [DesignController::class, 'delete']);
    Route::get('/designs/toggle/{design}', [DesignController::class, 'toggle']);
    Route::get('/designs/slider/{design}', [DesignController::class, 'slider']);

    //designs->imgs
    Route::get('/designs/show/sub-images/{design}', [DesignController::class, 'showImgs']);
    Route::get('/designs/sub-imgs-create/{design}', [DesignController::class, 'createSubImgs']);
    Route::post('/designs/sub-imgs-store/{design}', [DesignController::class, 'storeSubImgs']);
    Route::get('/designs/sub-imgs-edit/{design}/{designimg}', [DesignController::class, 'editSubImgs']);
    Route::post('/designs/sub-imgs-update/{design}/{designimg}', [DesignController::class, 'updateSubImgs']);
    Route::get('/designs/sub-imgs-delete/{design}/{designimg}', [DesignController::class, 'deleteSubImgs']);
    Route::get('/designs/sub-imgs-toggle/{design}/{designimg}', [DesignController::class, 'toggleSubImgs']);


    //competitions
    Route::get('competitions', [CompetitionController::class, 'index']);
    Route::get('competitions/show/{competition}', [CompetitionController::class, 'show']);
    Route::get('competitions/create', [CompetitionController::class, 'create']);
    Route::post('competitions/store', [CompetitionController::class, 'store']);
    Route::get('competitions/edit/{competition}', [CompetitionController::class, 'edit']);
    Route::post('competitions/update/{competition}', [CompetitionController::class, 'update']);
    Route::get('competitions/delete/{competition}', [CompetitionController::class, 'delete']);
    Route::get('competitions/toggle/{competition}', [CompetitionController::class, 'toggle']);


    //competition designs
    Route::get('competitions/designs/{competition}', [CompetitionController::class, 'allDesigns']);

    Route::get('competitions/show/designs/{competition}/{competitionDesign}', [CompetitionController::class, 'showDesigns']);

    Route::get('competitions/create/designs/{competition}', [CompetitionController::class, 'createDesign']);

    Route::post('competitions/store/designs/{competition}', [CompetitionController::class, 'storeDesign']);

    Route::get('competitions/edit/designs/{competition}/{competitionDesign}', [CompetitionController::class, 'editDesign']);

    Route::post('competitions/update/designs/{competition}/{competitionDesign}', [CompetitionController::class, 'updateDesign']);

    Route::get('competitions/delete/designs/{competitionDesign}', [CompetitionController::class, 'deleteDesign']);

    Route::get('competitions/toggle/designs/{competitionDesign}', [CompetitionController::class, 'toggleDesign']);


    //packages
    Route::get('/packages',[PackageController::class, 'index']);
    Route::get('/packages/show/{package}',[PackageController::class, 'show']);
    Route::get('/packages/create',[PackageController::class, 'create']);
    Route::post('/packages/store',[PackageController::class, 'store']);
    Route::get('/packages/edit/{package}',[PackageController::class, 'edit']);
    Route::post('/packages/update/{package}',[PackageController::class, 'update']);
    Route::get('/packages/delete/{package}',[PackageController::class, 'delete']);


    //users
    Route::get('/users',[UserController::class, 'index']);
    Route::get('/users/delete/{id}',[UserController::class, 'delete']);

    //orders
    Route::get('/orders',[OrderController::class, 'index']);
    Route::get('/orders/show/{order}',[OrderController::class, 'show']);
    Route::get('/orders/delete/{order}',[OrderController::class, 'delete']);

    Route::get('/orders/accepted/{order}', [OrderController::class, 'accepted']);
    Route::get('/orders/completed/{order}', [OrderController::class, 'completed']);
    Route::get('/orders/canceled/{order}', [OrderController::class, 'canceled']);


    //User Messages
    Route::get('/messages', [MessageController::class, 'index']);
    Route::get('/messages/show/{contact}', [MessageController::class, 'show']);
    Route::post('/messages/response/{contact}', [MessageController::class, 'response']);

    //Notifications
    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::get('/notifications/delete/{notification}', [NotificationController::class, 'delete']);




    //Admins
    Route::middleware('isSuperAdmin')->group(function () {
        Route::get('/admins', [AdminController::class, 'index']);
        Route::get('/admins/create', [AdminController::class, 'create']);
        Route::post('/admins/store', [AdminController::class, 'store']);
        Route::get('/admins/delete/{id}', [AdminController::class, 'delete']);
        Route::get('/admins/promot/{id}', [AdminController::class, 'promot']);
        Route::get('/admins/demot/{id}', [AdminController::class, 'demot']);
    });




});
