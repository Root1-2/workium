<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function () {
    return "<h1>Available Jobs<h1>";
})->name("jobs");

Route::get("/posts/{id}", function (string $id) {
    return "Post" . " " . $id;
})->whereNumber("id");

Route::get("/posts/{id}/comments/{commentId}", function (string $commentId, string $id) {
    return "Post" . " " . $id . "Comment No. " . $commentId;
});