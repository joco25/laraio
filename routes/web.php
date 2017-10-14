<?php
use Illuminate\Support\Facades\Redis;
use App\Events\UserSignedUp;
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
	//using the global event function in place of direct redis
	event(new UserSignedUp(Request::query('name')));

	return view('welcome');
});
