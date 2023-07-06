<?php
use App\Http\Controllers\barangcontroller;
use Illuminate\Support\Facades\Route;

route::get('/', function(){
    return view('welcome');
});
Route::resource('barang', \App\Http\Controllers\barangcontroller::class);
