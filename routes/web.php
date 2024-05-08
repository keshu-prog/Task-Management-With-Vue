<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear-cache', function() {
	
	$exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
	$exitCode = Artisan::call('view:clear');
	$exitCode = Artisan::call('route:clear');
	
    return '<h1>Cache facade value cleared</h1>';
});

Route::get('/', function () {
    return view('layouts.app');
});
