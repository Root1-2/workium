<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function () {
    return "<h1>Available Jobs<h1>";
})->name("jobs");

Route::get("/test", function() {
    return response()->json(["name" => "John Doe"])->cookie("name", "Brad");
});

Route::get("/error", function() {
    return response("Not Found", 404);
});

Route::get("/download", function() {
    return response()->download(public_path("favicon.ico"));
});

Route::get("/read-cookie", function(Request $request) {
    $cookieValue = $request->cookie("name");
    return response()->json(["cookie" => $cookieValue]);
});