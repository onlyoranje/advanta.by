<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProfileController;

/*Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    //Route::get('/dashboard', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/dashboard', [ProfileController::class, 'update'])->name('profile.update');


    Route::get('/rubric', [App\Http\Controllers\RubricsController::class, 'rubric'])->name('rubrics');
    Route::get('/rubric/{rubric}', [App\Http\Controllers\RubricsController::class, 'rubric'])->name('rubric');
    Route::get('/dashboard/rubric', [App\Http\Controllers\RubricsController::class, 'rubrics'])->name('rubric_dashboard');
    Route::post('/dashboard/rubric', [App\Http\Controllers\RubricsController::class, 'addRubric'])->name('addRubricToDB');
    Route::get('/dashboard/rubric/add', [App\Http\Controllers\RubricsController::class, 'addRubricForm'])->name('rubric_dashboard_add');
    Route::get('/dashboard/rubric/{rubric}', [App\Http\Controllers\RubricsController::class, 'detail'])->name('rubric_dashboard_edit');
    Route::patch('/dashboard/rubric/{rubric}', [App\Http\Controllers\RubricsController::class, 'editRubric'])->name('editRubricToDB');
    Route::get('/dashboard/rubric/{rubric}/delete', [App\Http\Controllers\RubricsController::class, 'delete'])->name('rubric_dashboard_delete');
    Route::delete('/dashboard/rubric/{rubric}', [App\Http\Controllers\RubricsController::class, 'destroyRubric'])->name('rubric_dashboard_destroy');

    Route::get('/dashboard/products', [App\Http\Controllers\ProductsController::class, 'products_db'])->name('product_dashboard');
    Route::get('/dashboard/products/add', [App\Http\Controllers\ProductsController::class, 'addProduct'])->name('product_dashboard_add');
    Route::post('/dashboard/products', [App\Http\Controllers\ProductsController::class, 'addProductToDB'])->name('addProductToDB');
    Route::get('/dashboard/products/{product}/delete',[App\Http\Controllers\ProductsController::class, 'deleteProduct'])->name('product_dashboard_delete');
    Route::delete('/dashboard/products/{product}',[App\Http\Controllers\ProductsController::class, 'destroyProduct'])->name('product_destroy');
    Route::get('/dashboard/products/{product}', [App\Http\Controllers\ProductsController::class, 'editProduct'])->name('product_dashboard_edit');
    Route::patch('/dashboard/products/{product}',[App\Http\Controllers\ProductsController::class, 'updateProduct'])->name('product_update');


    Route::get('/dashboard/posts/', [App\Http\Controllers\PostsController::class, 'posts_dashboard'])->name('posts_dashboard');
    Route::post('/dashboard/post', [App\Http\Controllers\PostsController::class, 'post_add_db'])->name('post_dashboard_add_db');
    Route::get('/dashboard/post/add', [App\Http\Controllers\PostsController::class, 'post_add'])->name('post_dashboard_add');
    Route::get('/dashboard/post/{post}', [App\Http\Controllers\PostsController::class, 'post_dashboard'])->name('post_dashboard');
    Route::patch('/dashboard/post/{post}', [App\Http\Controllers\PostsController::class, 'edit_post'])->name('post_dashboard_edit');
    Route::get('/dashboard/post/{post}/delete', [App\Http\Controllers\PostsController::class, 'delete_post'])->name('post_dashboard_delete');
    Route::delete('/dashboard/post/{post}', [App\Http\Controllers\PostsController::class, 'destroy_post'])->name('destroy_post');

});

Route::get('/posts/', [App\Http\Controllers\PostsController::class, 'posts'])->name('posts');
Route::get('/post/{post}', [App\Http\Controllers\PostsController::class, 'post'])->name('post');



Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/test', function () {
    return view('test');
})->name('test');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
