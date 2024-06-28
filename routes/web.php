<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthenController;





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

/*
* Route for task
*/



Route::get('registration', [AuthenController::class, 'registration'])->name('register');
Route::post('register-user', [AuthenController::class, 'registerUser'])->name('register-user');

Route::get('login', [AuthenController::class, 'login'])->name('login');
Route::post('login-user', [AuthenController::class, 'loginUser'])->name('login-user');




Route::middleware(['auth.check'])->group(function () {

    Route::get('dashboard', [AuthenController::class, 'dashboard'])->name('dashboard');
    Route::get('logout', [AuthenController::class, 'logout'])->name('logout');

    Route::resource('/products', ProductController::class);

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/users/{userId}/posts', [PostController::class, 'userPosts'])->name('posts.user');
});





//     Route::get('/tasks', [TaskController::class, 'tasks']);
//     Route::post('/task', [TaskController::class, 'store']);
//     Route::put('/task/{task_id}/finish', [TaskController::class, 'setTaskFinish']);
//     Route::get('/task/{task_id}/comments', [TaskController::class, 'getTaskWithComments']);
//     Route::post('/task/{task_id}/comment', [CommentController::class,'storeComment']);
//     Route::get('/task/{task_id}', [TaskController::class, 'getTasksById']);
//     Route::put('/task/{task_id}', [TaskController::class, 'update']);

//     Route::resource('/products', ProductController::class);

//     Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
//     Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
//     Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
//     Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
//     Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
//     Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
//     Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
//     Route::get('/users/{userId}/posts', [PostController::class, 'userPosts'])->name('posts.user');
// });





/*
 * Route for comment
 */
