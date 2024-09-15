<?php

use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
//public
Route::group([
    'controller' => PublicController::class,
], function () {
    Route::get('index', 'index')->name('index');
    Route::get('contact', 'contact')->name('contact-us');
    Route::get('testimonial', 'testimonial')->name('testimonial');
    Route::get('topic-listing', 'topiclisting')->name('topiclisting');
    Route::get('/{id}/topic-details', 'topicdetail')->name('topic-detail');
});

//admin
Route::group([
    'controller' => AdminController::class,
], function () {
    Route::get('topics', 'topics')->name('topics');
    Route::get('add_topic', 'addtopic')->name('addtopic');
    Route::get('edit_topic', 'edittopic')->name('edittopic');
    Route::get('topic_details', 'topicdetails')->name('topicdetails');

    Route::get('categories', 'categories')->name('categories');
    Route::get('add_category', 'addcategory')->name('addcategory');
    Route::get('edit_category', 'editcategory')->name('editcategory');

    Route::get('messages', 'messages')->name('messages');
    Route::get('message_details', 'messagedetails')->name('messagedetails');

    Route::get('testimonials', 'testimonials')->name('testimonials');
    Route::get('add_testimonial', 'addtestimonial')->name('addtestimonial');
    Route::get('edit_testimonial', 'edittestimonial')->name('edittestimonial');

    Route::get('users', 'users')->name('users');
    Route::get('add_user', 'adduser')->name('adduser');
    Route::get('edit_user', 'edituser')->name('edituser');
});

//categories
Route::prefix('admin')->group(function () {
    Route::group([
        'prefix' => 'categories',
    ], function () {
        Route::get('', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('{id}/show', [CategoryController::class, 'show'])->withTrashed()->name('admin.categories.show');
        Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('{id}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');
        Route::delete('{id}/delete', [CategoryController::class, 'delete'])->name('categories.delete');
        Route::get('trashed', [CategoryController::class, 'showDeleted'])->name('categories.showDeleted');
        Route::patch('{id}', [CategoryController::class, 'restore'])->name('categories.restore');
        Route::delete('{id}/forceDelete', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');
    });

    //topics
    Route::group([
        'controller' => TopicController::class,
        'prefix' => 'topics',
        'as' => 'topics.',
    ], function () {
        Route::get('', 'index')->name('index');
        Route::get('create',  'create')->name('create');
        Route::post('store',  'store')->name('store');
        Route::get('trashed',  'showDeleted')->name('showDeleted');
        Route::get('{id}/edit',  'edit')->name('edit');
        Route::get('{id}/show',  'show')->name('show');
        Route::put('{id}/update',  'update')->name('update');
        Route::get('{id}/delete',  'destroy')->name('destroy');
        Route::delete('{id}/delete',  'delete')->name('delete');
        Route::patch('{id}/restore',  'restore')->name('restore');
        Route::delete('{id}/force',  'forceDelete')->name('forceDelete');
    });

    //testimonials
    Route::group([
        'controller' => TestimonialController::class,
        'prefix' => 'testimonials',
        'as' => 'testimonials.',
    ], function () {
        Route::get('', 'index')->name('index');
        Route::get('create',  'create')->name('create');
        Route::post('store',  'store')->name('store');
        Route::get('trashed',  'showDeleted')->name('showDeleted');
        Route::get('{id}/edit',  'edit')->name('edit');
        // Route::get('{id}/show',  'show')->name('show');
        Route::put('{id}/update',  'update')->name('update');
        Route::get('{id}/delete',  'destroy')->name('destroy');
        Route::delete('{id}/delete',  'delete')->name('delete');
        Route::patch('{id}/restore',  'restore')->name('restore');
        Route::delete('{id}/force',  'forceDelete')->name('forceDelete');
    });

    //users
    Route::group([
        'controller' => UserController::class,
        'prefix' => 'users',
        'as' => 'users.',
    ], function () {
        Route::get('', 'index')->name('index');
        Route::get('create',  'create')->name('create');
        Route::post('store',  'store')->name('store');
        Route::get('{id}/edit',  'edit')->name('edit');
        Route::put('{id}/update',  'update')->name('update');
        // Route::put('{id}/store', 'store')->name('store');
    });

    //message
    Route::group([
        'controller' => ContactMessageController::class,
        'prefix' => 'messages',
        'as' => 'messages.',
    ], function () {
        Route::get('', 'index')->name('index');
        Route::get('create',  'create')->name('create');
        Route::post('store',  'store')->name('store');
        Route::get('trashed',  'showDeleted')->name('showDeleted');
        Route::get('{id}/show',  'show')->name('show');
        Route::get('{id}/delete',  'destroy')->name('destroy');
        Route::delete('{id}/delete',  'delete')->name('delete');
        Route::patch('{id}/restore',  'restore')->name('restore');
        Route::delete('{id}/force',  'forceDelete')->name('forceDelete');
        // Route::get('contact-us',  'contactForm')->name('contactForm');
        // Route::post('store',  'sendMessage')->name('sendMessage');
        Route::patch('/{id}/read', 'markAsRead')->name('markAsRead');
    });
});




Route::get('contact-us', [ContactMessageController::class, 'contactForm'])->name('contectForm');
Route::post('contact-us', [ContactMessageController::class, 'sendMessage'])->name('sendMessage');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
