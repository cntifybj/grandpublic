<?php

use App\Http\Controllers\Api\AdvisoryController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\VideoController;
use App\Http\Controllers\Api\CenterOfInterestController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'getUserInfos']);


    Route::get('/categories', [VideoController::class, 'getAllCategories']);

    Route::get('/videos/latests', [VideoController::class, 'latests']);
    Route::get('/videos/most_liked', [VideoController::class, 'mostLiked']);
    Route::get('/{category_name}/videos', [VideoController::class, 'indexByCategory']);
    Route::get('/videos/search', [VideoController::class, 'search']);

    Route::get('/{category_name}/videos/latests', [VideoController::class, 'latestsByCategory']);

    Route::get('/videos/{id}', [VideoController::class, 'getVideo']);
    Route::get('/videos/{video_id}/like', [VideoController::class, 'likeVideo']);
    Route::get('/videos/{video_id}/dislike', [VideoController::class, 'dislikeVideo']);

    Route::get('/videos/{video_id}/comments', [CommentController::class, 'getVideoComments']);
    Route::post('/comments/create', [CommentController::class, 'store']);
    Route::get('/comments/{comment_id}/like', [CommentController::class, 'likeComment']);
    Route::get('/comments/{comment_id}/dislike', [CommentController::class, 'dislikeComment']);

    Route::get('/advisories/landscape', [AdvisoryController::class, 'landscape']);
    Route::get('/advisories/portrait', [AdvisoryController::class, 'portrait']);

    Route::get('/subscriptions', [SubscriptionController::class, 'index']);
    Route::post('/payment/store', [SubscriptionController::class, 'storePayment']);

    Route::get('/centers_of_interest', [CenterOfInterestController::class, 'index']);
    Route::post('/centers_of_interest/submit_preferences', [CenterOfInterestController::class, 'submit_preferences']);

    Route::get('/notifications', [NotificationController::class, 'getNotifications']);
});

Route::controller(AuthController::class)->name('api.user.')->group(function () {
    Route::post('/user/register', 'create_user')->name('register');
    Route::post('/user/login', 'log_user')->name('login');
});

Route::any('/kkiapay/callback', [PaymentController::class, 'handleKKiaPayCallback'])->name('kkiapay.callback');
