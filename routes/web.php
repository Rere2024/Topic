<?php
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('index', [PublicController::class, 'index'])->name('index');
//  Route::get('topic-details', [PublicController::class, 'tobicdetails'])->name('topicdetails');
Route::group([
    'controller' => PublicController::class,
], function () {
    Route::get('index', 'index')->name('index');
    Route::get('contact', 'contact')->name('contact');
    Route::get('testimonial', 'testimonial')->name('testimonial');
    Route::get('topic-listing', 'topiclisting')->name('topiclisting');
    Route::get('topic-details', 'topicdetails')->name('topicdetails');

});


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

// Route::get('topics', [AdminController::class, 'topics'])->name('topics');




// Route::prefix('admin')->group(function () {
//     Route::prefix('Topics')->group(function () {
//         Route::get('', [TopicController::class, 'index'])->name('topics.index');
//         Route::get('{id}/show', [ClassController::class, 'show'])->withTrashed()->name('admin.classes.show');
//         Route::get('create', [ClassController::class, 'create'])->name('classes.create');
//         Route::post('', [ClassController::class, 'store'])->name('classes.store');
//         Route::get('{id}/edit', [ClassController::class, 'edit'])->name('classes.edit');
//         Route::put('{id}', [ClassController::class, 'update'])->name('classes.update');
//         Route::delete('{id}/delete', [ClassController::class, 'destroy'])->name('classes.destroy');
//         Route::get('trashed', [ClassController::class, 'showDeleted'])->name('clases.showDeleted');
//         Route::patch('{id}', [ClassController::class, 'restore'])->name('classes.restore');
//         Route::delete('{id}/forcedelete', [ClassController::class, 'forcedelete'])->name('classes.forcedelete');
    // });

// });