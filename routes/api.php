<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware( 'client' )->get('/user', function (Request $request) {
    return response(  )->json($request->user(), 200) ;
});
