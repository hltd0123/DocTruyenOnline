<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// admin Routes
Route::get('/admin/author/create', function () {
    return view('admin.author_create');
});

Route::get('/admin/author/list', function () {
    return view('admin.author_list');
});

Route::get('/admin/author/update', function () {
    return view('admin.author_update');
});

Route::get('/admin/category/create', function () {
    return view('admin.cate_create');
});

Route::get('/admin/category/list', function () {
    return view('admin.cate_list');
});

Route::get('/admin/category/update', function () {
    return view('admin.cate_update');
});

Route::get('/admin/chapter/list', function () {
    return view('admin.chapter_list');
});

Route::get('/admin/chapter/update', function () {
    return view('admin.chapter_update');
});

Route::get('/admin/comment/detail', function () {
    return view('admin.comment_detail');
});

Route::get('/admin/comment/list', function () {
    return view('admin.comment_list');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/stories/list', function () {
    return view('admin.stories_list');
});

Route::get('/admin/stories/update', function () {
    return view('admin.stories_update');
});

// author Routes
Route::get('/author/chapter/create', function () {
    return view('author.chapter_create');
});

Route::get('/author/chapter/update', function () {
    return view('author.chapter_update');
});

Route::get('/author/comment/detail', function () {
    return view('author.comment_detail');
});

Route::get('/author/comment/list', function () {
    return view('author.comment_list');
});

Route::get('/author/stories/create', function () {
    return view('author.stories_create');
});

Route::get('/author/stories/list', function () {
    return view('author.stories_list');
});

Route::get('/author/stories/update', function () {
    return view('author.stories_update');
});
