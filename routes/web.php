<?php

use App\Models\Category;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

use Illuminate\Support\Facades\Route;

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
    return view('home', [
        'tab' => 'MyWebsite | Home',
        'active' => 'home',
        'title' => 'Home'
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function(){
    return view('categories', [
        'tab' => 'MyWebsite | Categories',
        'active' => 'categories',
        'title' => 'Posts Categories',
        'categories' => Category::all()
    ]);
});

// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('posts', [
//         'tab' => $category->name,
//         'active' => 'categories',
//         'title' => "Post berdasar kategori : $category->name",
//         'posts' => $category->posts->load('category', 'author')
//     ]);
// });

// Route::get('/authors/{author:username}', function(User $author){
//     return view('posts', [
//         'tab' => $author->name,
//         'active' => 'posts',
//         'title' => "Post berdasar penulis : $author->name",
//         'posts' => $author->posts->load('category', 'author')
//     ]);
// });

Route::get('/about', function () {
    return view('about', [
        'tab' => 'MyWebsite | About Us',
        'active' => 'aboutus',
        'title' => 'About Us'
    ]);
});
 
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');       
Route::post('/login', [LoginController::class, 'authenticate']); 

Route::post('/logout', [LoginController::class, 'logout']);       

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard/index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');