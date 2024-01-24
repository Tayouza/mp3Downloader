<?php

use App\Livewire\Downloader;
use Illuminate\Support\Facades\Route;

Route::get('/', Downloader::class);
Route::get('/test', function() {
    $path = exec('python3 ' . base_path('converter') . ' https://www.youtube.com/watch?v=TtPAFtcvRV8 ./');
    return $path;
});