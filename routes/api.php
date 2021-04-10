<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Collections\CatController;
use App\Http\Controllers\Api\Collections\CompetitionController;
use App\Http\Controllers\Api\Collections\ContactController;
use App\Http\Controllers\Api\Collections\DesignController;
use App\Http\Controllers\Api\Collections\HomeController;
use App\Http\Controllers\Api\Collections\OrderController;
use App\Http\Controllers\Api\Package\PackageController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });





Route::middleware('lang')->group(function () {

    //register
    Route::post('register', [AuthController::class, 'register']);
    //login
    Route::post('login', [AuthController::class, 'login']);
    //send code to verify email
    Route::post('send-code', [AuthController::class, 'sendCode']);
    //verify email
    Route::post('verify-code', [AuthController::class, 'verify']);
    //forgot-password
    Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
    //reset-password
    Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword']);

    //packages
    Route::get('/packages', [PackageController::class, 'getPackages']);

    Route::middleware('auth:api')->group(function () {

        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/update/profile', [AuthController::class, 'updateProfil']);


        //Home
        Route::get('/', [HomeController::class, 'index']);

        //Categories
        Route::get('cats', [CatController::class, 'index']);
        Route::get('cats/show/{id}', [CatController::class, 'show']);

        //Designs
        Route::get('designs', [DesignController::class, 'index']);
        Route::get('designs/show/{id}', [DesignController::class, 'show']);
        Route::get('designs/offers', [DesignController::class, 'getOffers']);
        //Add rate for design
        Route::post('designs/add-rate/{design}', [DesignController::class, 'addRate']);

        //choose package
        Route::post('/packages/choose-package/{package}', [PackageController::class, 'choosePackage']);

        //ready order
        Route::post('order/ready/{design}', [OrderController::class, 'ready']);
        //request order
        Route::post('order/upon-request/{design}', [OrderController::class, 'uponRequest']);
        //show my order
        Route::get('orders/show', [OrderController::class, 'showMyOrder']);

        //Competitions
        Route::get('competitions', [CompetitionController::class, 'index']);
        Route::get('competitions/show/{id}', [CompetitionController::class, 'show']);
        Route::get('competitions/designs', [CompetitionController::class, 'getAllCompetitionDesigns']);
        //add rate competitions
        Route::post('competitions/designs/add-rate/{competitionDesign}', [CompetitionController::class, 'addRate']);


        //send message to admin
        Route::post('contact/send-message', [ContactController::class, 'sendMessage']);
    });
});
