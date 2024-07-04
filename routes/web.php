<?php

use App\Http\Controllers\WsBroadcastTest;
use Illuminate\Mail\TextMessage;
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

Route::get('/ws_laravel', function() {
    $data = event(new TextMessage("coba"));
    return view('ws_wellcome.index', compact('data'));
});
Route::post('/broadcast-message', [WsBroadcastTest::class, 'sendMessage']);
// Route::post('/broadcast-message', function() {
//     return response()->json("Hello World");
// });

// Route::post('/broadcast-message', [WsBroadcastTest::class, 'sendMessage']);
