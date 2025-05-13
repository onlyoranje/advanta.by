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


    Route::get('/dashboard/parameter', [App\Http\Controllers\ParametersController::class, 'parameters'])->name('parameter_dashboard')->middleware('isadmin');
    Route::post('/dashboard/parameter', [App\Http\Controllers\ParametersController::class, 'addParameter'])->name('addParameterToDB')->middleware('isadmin');
    Route::get('/dashboard/parameter/add', [App\Http\Controllers\ParametersController::class, 'addParameterForm'])->name('parameter_dashboard_add')->middleware('isadmin');
    Route::get('/dashboard/parameter/{parameter}', [App\Http\Controllers\ParametersController::class, 'detail'])->name('parameter_dashboard_edit')->middleware('isadmin');
    Route::patch('/dashboard/parameter/{parameter}', [App\Http\Controllers\ParametersController::class, 'editParameter'])->name('editParameterToDB')->middleware('isadmin');
    Route::get('/dashboard/parameter/{parameter}/delete', [App\Http\Controllers\ParametersController::class, 'delete'])->name('parameter_dashboard_delete')->middleware('isadmin');
    Route::delete('/dashboard/parameter/{parameter}', [App\Http\Controllers\ParametersController::class, 'destroyParameter'])->name('parameter_dashboard_destroy')->middleware('isadmin');

    Route::get('/dashboard/parameter_type', [App\Http\Controllers\ParameterTypesController::class, 'types'])->name('parameter_type_dashboard')->middleware('isadmin');
    Route::post('/dashboard/parameter_type', [App\Http\Controllers\ParameterTypesController::class, 'addTypetoDB'])->name('addTypeToDB')->middleware('isadmin');
    Route::get('/dashboard/parameter_type/add', [App\Http\Controllers\ParameterTypesController::class, 'addTypeForm'])->name('parameter_type_add')->middleware('isadmin');
    Route::get('/dashboard/parameter_type/{type}', [App\Http\Controllers\ParameterTypesController::class, 'detail'])->name('parameter_type_edit')->middleware('isadmin');
    Route::patch('/dashboard/parameter_type/{type}', [App\Http\Controllers\ParameterTypesController::class, 'editType'])->name('editTypetoDB')->middleware('isadmin');
    Route::get('/dashboard/parameter_type/{type}/delete', [App\Http\Controllers\ParameterTypesController::class, 'delete'])->name('parameter_type_delete')->middleware('isadmin');
    Route::delete('/dashboard/parameter_type/{type}', [App\Http\Controllers\ParameterTypesController::class, 'destroy'])->name('parameter_type_destroy')->middleware('isadmin');

    Route::get('/dashboard/parameter', [App\Http\Controllers\ParametersController::class, 'parameters'])->name('parameter_dashboard');
    Route::post('/dashboard/parameter', [App\Http\Controllers\ParametersController::class, 'addParameter'])->name('addParameterToDB');
    Route::get('/dashboard/parameter/add', [App\Http\Controllers\ParametersController::class, 'addParameterForm'])->name('parameter_dashboard_add');
    Route::get('/dashboard/parameter/{parameter}', [App\Http\Controllers\ParametersController::class, 'detail'])->name('parameter_dashboard_edit');
    Route::patch('/dashboard/parameter/{parameter}', [App\Http\Controllers\ParametersController::class, 'editParameter'])->name('editParameterToDB');
    Route::get('/dashboard/parameter/{parameter}/delete', [App\Http\Controllers\ParametersController::class, 'delete'])->name('parameter_dashboard_delete');
    Route::delete('/dashboard/parameter/{parameter}', [App\Http\Controllers\ParametersController::class, 'destroyParameter'])->name('parameter_dashboard_destroy');

    Route::get('/dashboard/parameter_type', [App\Http\Controllers\ParameterTypesController::class, 'types'])->name('parameter_type_dashboard');
    Route::post('/dashboard/parameter_type', [App\Http\Controllers\ParameterTypesController::class, 'addTypetoDB'])->name('addTypeToDB');
    Route::get('/dashboard/parameter_type/add', [App\Http\Controllers\ParameterTypesController::class, 'addTypeForm'])->name('parameter_type_add');
    Route::get('/dashboard/parameter_type/{type}', [App\Http\Controllers\ParameterTypesController::class, 'detail'])->name('type_dashboard_edit');
    Route::patch('/dashboard/parameter_type/{type}', [App\Http\Controllers\ParameterTypesController::class, 'editType'])->name('editTypetoDB');
    Route::get('/dashboard/parameter_type/{type}/delete', [App\Http\Controllers\ParameterTypesController::class, 'delete'])->name('type_dashboard_delete');
    Route::delete('/dashboard/parameter_type/{type}', [App\Http\Controllers\ParameterTypesController::class, 'destroy'])->name('parameter_type_destroy');

    Route::get('/dashboard/medias/', [App\Http\Controllers\MediasController::class, 'medias_dashboard'])->name('medias_dashboard');
    Route::post('/dashboard/media', [App\Http\Controllers\MediasController::class, 'media_add_db'])->name('media_dashboard_add_db');
    Route::get('/dashboard/media/add', [App\Http\Controllers\MediasController::class, 'media_add'])->name('media_dashboard_add');
    Route::get('/dashboard/media/{media}', [App\Http\Controllers\MediasController::class, 'media_edit'])->name('media_dashboard_edit');
    Route::patch('/dashboard/media/{media}', [App\Http\Controllers\MediasController::class, 'media_update'])->name('media_dashboard_update');
    Route::get('/dashboard/media/{media}/delete', [App\Http\Controllers\MediasController::class, 'media_delete'])->name('media_dashboard_delete');
    Route::delete('/dashboard/media/{media}', [App\Http\Controllers\MediasController::class, 'media_destroy'])->name('media_destroy');

    Route::get('/dashboard/certificates/', [App\Http\Controllers\CertificatesController::class, 'certificates_dashboard'])->name('certificates_dashboard');
    Route::post('/dashboard/certificates', [App\Http\Controllers\CertificatesController::class, 'certificates_add_db'])->name('certificates_dashboard_add_db');
    Route::get('/dashboard/certificates/add', [App\Http\Controllers\CertificatesController::class, 'certificates_add'])->name('certificates_dashboard_add');
    Route::get('/dashboard/certificates/{certificates}', [App\Http\Controllers\CertificatesController::class, 'certificates_edit'])->name('certificates_dashboard_edit');
    Route::patch('/dashboard/certificates/{certificates}', [App\Http\Controllers\CertificatesController::class, 'certificates_update'])->name('certificates_dashboard_update');
    Route::get('/dashboard/certificates/{certificates}/delete', [App\Http\Controllers\CertificatesController::class, 'certificates_delete'])->name('certificates_dashboard_delete');
    Route::delete('/dashboard/certificates/{certificates}', [App\Http\Controllers\CertificatesController::class, 'certificates_destroy'])->name('certificates_destroy');

    Route::get('/dashboard/contacts', [App\Http\Controllers\ContactsController::class, 'contacts_edit'])->name('contacts_dashboard_edit');
    Route::patch('/dashboard/contacts', [App\Http\Controllers\ContactsController::class, 'contacts_update'])->name('contacts_dashboard_update');

    Route::get('/dashboard/pages/', [App\Http\Controllers\StaticPagesController::class, 'pages_dashboard'])->name('pages_dashboard');
    Route::get('/dashboard/pages/add', [App\Http\Controllers\StaticPagesController::class, 'pages_add'])->name('pages_dashboard_add');
    Route::post('/dashboard/pages', [App\Http\Controllers\StaticPagesController::class, 'pages_add_db'])->name('pages_dashboard_add_db');
    Route::get('/dashboard/pages/{page}', [App\Http\Controllers\StaticPagesController::class, 'pages_edit'])->name('pages_edit');
    Route::patch('/dashboard/pages/{page}', [App\Http\Controllers\StaticPagesController::class, 'pages_update'])->name('pages_update');
    Route::get('/dashboard/pages/{page}/delete', [App\Http\Controllers\StaticPagesController::class, 'pages_delete'])->name('pages_delete');
    Route::delete('/dashboard/pages/{page}', [App\Http\Controllers\StaticPagesController::class, 'pages_destroy'])->name('pages_destroy');


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
