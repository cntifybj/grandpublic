<?php

use App\Enums\VideoCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\BackOffice\AuthController as BackOfficeAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BackOffice\CommentController as BackOfficeCommentController;
use App\Http\Controllers\BackOffice\SlideController;
use App\Http\Controllers\BackOffice\AdvisoryController;
use App\Http\Controllers\BackOffice\StaffMemberController;
use App\Http\Controllers\BackOffice\SubscriptionController;
use App\Http\Controllers\BackOffice\UserSubscriptionController;
use App\Http\Controllers\BackOffice\VideoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Models\StaffMember;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\BackOffice\CenterOfInterestController;
use App\Http\Controllers\BackOffice\NotificationController;
use App\Http\Controllers\BackOffice\UserController;
use App\Http\Controllers\BackOffice\UserMessageController;
use App\Http\Controllers\CommentController;


Route::get('/email/verify', [VerificationController::class, 'show'])->middleware('auth')->name('verification.notice');
Route::post('/email/verification-notification', [VerificationController::class, 'send'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/mentions-legales', [HomeController::class, 'mentionsLegales'])->name('mentions.legales');
Route::get('/politique-confidentialite', [HomeController::class, 'politiqueConfidentialite'])->name('politique.confidentialite');
Route::get('/conditions-utilisation', [HomeController::class, 'conditionsUtilisation'])->name('conditions.utilisation');


Route::get('/comments/{video}', [CommentController::class, 'index'])->name('comments.index'); // Pour afficher les commentaires d'une vidéo
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store'); // Pour poster un commentaire


Route::get('facebook', [FacebookController::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

Route::get('/google/redirect', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');


Route::post('/comment/{id}/like', [CommentController::class, 'toggleLike'])->name('comment.like');
Route::post('/comment/{commentId}/reply', [CommentController::class, 'replyToComment'])->middleware('auth');


Route::get('/video/{id}', [VideoController::class, 'show'])->name('video.show');
Route::resource('videos', VideoController::class);
Route::post('videos/{videoId}/increment-views', [HomeController::class, 'incrementView'])->name('videos.incrementViews');

Route::post('/videos/{videoId}/toggle-like', [VideoController::class, 'toggleLike'])->name('videos.toggleLike');


Route::post('/videos/search', [VideoController::class, 'search'])->name('videos.search');


Route::post('/set-redirect', function (Request $request) {
    $request->session()->put('redirect', $request->input('redirect'));
    return response()->json(['status' => 'success']);
})->name('set.redirect');


Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');


Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');


Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');


Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Routes Authentification
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login_page');
Route::post('/login', [LoginController::class, 'login'])->name('do_login');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register_page');
Route::post('/register', [RegisterController::class, 'create'])->name('register');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions');
})->name('terms-and-conditions');
Route::get('/legal-notice-privacy-policy', function () {
    return view('legal-notice-privacy');
})->name('legal.notice');

/**
 * Routes Pages principales
 */
// routes/web.php

Route::view('/verify-payment', 'pages.payment_effectue')->name('status-payment');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about'); // À propos
Route::get('/live', [HomeController::class, 'live'])->name('live'); // À propos
Route::get('/videos', [HomeController::class, 'videos'])->name('videos'); // Liste des vidéos
Route::get('/opinion', [HomeController::class, 'opinion'])->name('opinion');
Route::get('/events', [HomeController::class, 'events'])->name('events');
Route::get('/portrait', [HomeController::class, 'portrait'])->name('portrait');
Route::get('/insolite', [HomeController::class, 'insolite'])->name('insolite');
Route::get('/video-watch/{slug}', [HomeController::class, 'videoWatch'])->name('video-watch'); // Visionnage de vidéo

Route::get('/videos/{category}/{order_by}', [HomeController::class, 'getVideoOrdered']);


Route::get('/contact', [HomeController::class, 'contact'])->name('contact'); // Page de contact
Route::post('/user_message/store', [UserMessageController::class, 'store'])->name('user_message.store');

// Routes de Souscription
Route::middleware('auth')->get('/sub-page', [HomeController::class, 'subPage'])->name('sub-page');
Route::get('/sub-add', [HomeController::class, 'subAdd'])->name('sub-add');
Route::middleware('auth')->get('/sub-pay', [HomeController::class, 'subPay'])->name('sub-pay');
Route::middleware('auth')->post('/payment', [PaymentController::class, 'store'])->name('payment.store');


/**
 * Routes protégées par l'authentification
 */
Route::middleware(['auth', 'verified'])->group(function () {

    // Route Mon compte
    Route::get('/account', [AccountController::class, 'showAccount'])->name('account');

    // Route pour la mise à jour du profil
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Toutes les routes d'administration
Route::prefix('/dashboard')->name('backoffice.')->group(function () {

    // Authentication routes
    Route::name('auth.')->group(function () {

        Route::middleware('not_connected')->group(function () {
            Route::get('/login', [BackOfficeAuthController::class, 'login'])->name('login');
            Route::post('/login', [BackOfficeAuthController::class, 'do_login'])->name('do_login');
        });

        Route::middleware('admin')->group(function () {
            Route::get('/logout', [BackOfficeAuthController::class, 'do_logout'])->name('do_logout');
            Route::get('/profile', [BackOfficeAuthController::class, 'profile'])->name('profile');
        });
    });

    // Main routes for DashBoard
    Route::middleware('admin')->group(function () {

        Route::get('/', function () {
            return redirect()->route('backoffice.videos.index');
        })->name('index');


        // Gestions des abonnements
        Route::get('/subscription/all', [SubscriptionController::class, 'fetch_resource'])->name('subscription.fetch_all');
        Route::resource('/subscription', SubscriptionController::class);


        // Gestion des utilisateurs
        Route::get('/user', [UserController::class, 'index'])->name('user.index');


        // Gestion des centres d'intérêt utilisateurs (appli mobile)
        Route::get('/user/center_of_interest/all', [CenterOfInterestController::class, 'fetch_resource'])->name('user.center_of_interest.fetch_all');
        Route::name('user')->resource('/user/center_of_interest', CenterOfInterestController::class);

        // Gestion des centres d'intérêt utilisateurs (appli mobile)
        Route::get('app_notifs/all', [NotificationController::class, 'fetch_resource'])->name('app_notifs.fetch_all');
        Route::post('app_notifs/change_posted_status', [NotificationController::class, 'postToApp'])->name('app_notifs.change-posted-status');
        Route::resource('app_notifs', NotificationController::class);

        // Gestion des abonnements utilisateurs
        Route::get('/user_subscription/all', [UserSubscriptionController::class, 'fetch_resource'])->name('user_subscription.fetch_all');
        Route::get('/user_subscription', [UserSubscriptionController::class, 'index'])->name('user_subscription.index');


        Route::get('/user_messages', [UserMessageController::class, 'index'])->name('user_message.index');
        Route::post('/user_message/change_read_status', [UserMessageController::class, 'changeReadStatus'])->name('user_messages.change-read-status');

        // Gestion des commentaires utilisateurs
        Route::get('/comment/all', [BackOfficeCommentController::class, 'fetch_resource'])->name('comment.fetch_all');
        Route::get('/comment', [BackOfficeCommentController::class, 'index'])->name('comment.index');
        Route::post('/comment/change_deleted_status', [BackOfficeCommentController::class, 'changeDeletedStatus'])->name('comment.change-deleted-status');


        // Slides
        Route::get('/slides/sort', [SlideController::class, 'sort_page'])->name('slide.sort_page');
        Route::post('/slides/sort', [SlideController::class, 'sort'])->name('slide.sort');
        Route::resource('/slides', SlideController::class);


        // Publicités
        Route::resource('/advisories', AdvisoryController::class);


        // Youtube Videos
        Route::get('/videos/all', [VideoController::class, 'fetch_resource'])->name('video.fetch_all');
        Route::resource('/videos', VideoController::class);

        // Routes accessibles que par les super administrateurs
        Route::middleware('super_admin')->group(function () {
            Route::get('/staff/all', [StaffMemberController::class, 'fetch_resource'])->name('staff.fetch_all');
            Route::post('/staff/{id}/stop', [StaffMemberController::class, 'stop'])->name('staff.stop');
            Route::post('/staff/{id}/restore', [StaffMemberController::class, 'restore'])->name('staff.restore');
            Route::resource('/staff', StaffMemberController::class);
        });
    });
});

Route::fallback(function () {
    return view('errors.notFound');
});

/*
Route::get('/setup', function () {
    StaffMember::create([
        'name' => 'Admin',
        'email' => 'admin@grandpublic.online',
        'password' => encrypt('admin@2024'),
        'role' => 'super_admin',
        'first_login' => '2024-11-12 19:16:54',
        'suspended' => 0
    ]);
});
 */
