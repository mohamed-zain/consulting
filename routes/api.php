<?php

use App\Http\Controllers\API\DataController;
use App\Http\Controllers\API\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
Route::post('Emplogin', [RegisterController::class, 'Emplogin']);
Route::post('totalPrice', [DataController::class, 'totalPrice']);
Route::post('userPackages', [DataController::class, 'userPackages']);
Route::post('userMissions', [DataController::class, 'userMissions']);
Route::post('userFiles', [DataController::class, 'userFiles']);
Route::post('userUpgrade', [DataController::class, 'userUpgrade']);
Route::post('myRqs', [DataController::class, 'myRqs']);
Route::post('koProducts', [DataController::class, 'koProducts']);
Route::post('checkNoti', [DataController::class, 'checkNoti']);
Route::post('Noti', [DataController::class, 'Noti']);
Route::post('rejectFile', [DataController::class, 'rejectFile']);
Route::post('acceptFile', [DataController::class, 'acceptFile']);
Route::post('App_Links', [DataController::class, 'AppLinks']);
Route::post('ChatsMessages', [DataController::class, 'ChatsMessages']);
Route::post('ChatList', [DataController::class, 'ChatList']);
Route::post('ChatListMsg', [DataController::class, 'ChatListMsg']);
Route::post('SendMessage', [DataController::class, 'SendMessage']);
Route::post('chatProList', [DataController::class, 'chatProList']);
Route::post('ChatList2', [DataController::class, 'ChatList2']);


Route::post('FilesByCat', [DataController::class, 'FilesByCat']);
Route::post('FilesCatStat', [DataController::class, 'FilesCatStat']);

Route::post('FilesUpload', [DataController::class, 'FilesUpload']);
Route::post('sendLocation', [DataController::class, 'sendLocation']);


Route::post('GetFilesList', [DataController::class, 'GetFilesList']);
Route::post('RequireFilesStat', [DataController::class, 'RequireFilesStat']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
