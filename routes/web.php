<?php
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
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

Route::get('/email', function () {

    Mail::to('ahsanazeem2496@gmail.com')->send(new WelcomeMail());

    return new WelcomeMail();
});

Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});

Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/error-page', function () {
    return view('error-page');
})->name('error-page');

Route::get('/signin', function () {
    return view('login');
})->name('signin');

Route::get('/signup', function () {
    return view('register');
})->name('signup');

Route::get('/gutter_calculator', function () {
    return view('gutter_calculator');
})->name('gutter_calculator');


Route::get('/change_password', function () {
    return view('change_password');
})->name('change_password');
Route::post('/change_password', [\App\Http\Controllers\Auth\ChangePasswordController::class, 'reset'])->name('change_password_post');


Route::get('/forgot_password', function () {
    return view('forgot_password');
})->name('forgot_password');


Route::get('/project_gallery', [App\Http\Controllers\GalleryController::class, 'project_gallery'])->name('project_gallery');

Route::get('/gallery_details/{id}', [App\Http\Controllers\GalleryController::class, 'gallery_details'])->name('gallery_details');


Route::get('/project_new', function () {
    return view('project_new');
})->name('project_new');

Route::get('/project_details/{id}', [App\Http\Controllers\ProjectController::class, 'project_details'])->name('project_details');

Route::get('/project_design/{id}', [App\Http\Controllers\ProjectController::class, 'project_design'])->name('project_design');

Route::post('/project_create', [App\Http\Controllers\ProjectController::class, 'project_create'])->name('project_create');

Route::post('/upload_project', [App\Http\Controllers\ProjectController::class, 'upload_project'])->name('upload_project');

Route::get('delete_project/{id?}', [App\Http\Controllers\ProjectController::class, 'delete_project'])->name('delete_project');


Route::post('/upload_myhome', [App\Http\Controllers\MyHomeController::class, 'my_homes'])->name('upload_myhome');

Route::get('/myhome_details/{id}', [App\Http\Controllers\MyHomeController::class, 'myhome_details'])->name('myhome_details');


Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact');



Route::group(['middleware' => 'auth'], function () {

    Route::get('admin/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin_index');

    Route::get('admin/users', [App\Http\Controllers\Admin\AdminController::class, 'users'])->name('admin_users');

    Route::get('admin/user/delete/{id}', [App\Http\Controllers\Admin\AdminController::class, 'user_delete'])->name('admin_user_delete');

    Route::post('admin/user/edit/{id}', [App\Http\Controllers\Admin\AdminController::class, 'user_edit'])->name('admin_user_edit');

    Route::get('admin/message', [App\Http\Controllers\Admin\AdminController::class, 'message'])->name('admin_message');

    Route::get('admin/message/delete/{id}', [App\Http\Controllers\Admin\AdminController::class, 'message_delete'])->name('admin_message_delete');

    Route::get('admin/admin_project/{id}', [App\Http\Controllers\Admin\AdminController::class, 'admin_project'])->name('admin_project');

    Route::get('admin/admin_project_delete/{id?}', [App\Http\Controllers\Admin\AdminController::class, 'admin_project_delete'])->name('admin_project_delete');

    Route::get('admin/admin_project_detail/{id}', [App\Http\Controllers\Admin\AdminController::class, 'admin_project_detail'])->name('admin_project_detail');

    Route::post('admin/update_gallery_project', [App\Http\Controllers\Admin\AdminController::class, 'update_gallery_project'])->name('admin_update_gallery_project');

    Route::post('admin/upload_project', [App\Http\Controllers\Admin\AdminController::class, 'upload_project'])->name('admin_upload_project');




    Route::get('admin/404', function () {
        return view('admin.404');
    })->name('admin_error');


    Route::get('admin/forgot_password', function () {
        return view('admin.forgot_password');
    })->name('admin_forgot_password');


    Route::get('admin/login', function () {
        return view('admin.login');
    })->name('admin_login');
});
