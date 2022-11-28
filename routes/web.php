<?php


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
    return view('welcome');
});

//-------> 1-USUL
Route::get('/test-route', function () {
    return view('test');
});

//-----> 2-USUL
Route::view('/test-route', 'test');

//-----> 3-USUL 
Route::get('/test-route', function () {
    return view('test');
});
// Bu bir-desa test-route-chiqadi
Route::redirect('/bir', '/test-route');

Route::get('/test-route/user', function () {
    return 'USERS';
});

// BU Xoxlasa-qo'yadi parametr-olish
Route::get('/user/{name?}', function ($name = null) {
    return 'Siz kiritgan name: 👉 ' . $name;
});

// // BU parametr-olish
Route::get('/user/{ghghjmch}', function ($user_id) {
    return 'Siz kiritgan date 👉 ' . $user_id;
});

// BU ko'p parametr-olish
Route::get('/user/{user_id}/image/{image_id}', function ($user_id, $image_id) {
    return 'Siz kiritgan date 👉 ' . $user_id . '<br> Sizni rasm id: 👉' . $image_id;
});

// Bu URL-admin bilan boshlanadi
Route::prefix('admin')->group(function () {
    Route::get('/user', function () {
        return "Siz kiritgan date 👉 /admin/users URL";
    });
});
