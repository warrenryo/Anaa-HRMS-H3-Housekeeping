<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\APIController;
use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\HOTEL1APIController;
use App\Http\Controllers\API\MobileAPIController;
use App\Http\Controllers\API\APILogisticsController;
use App\Http\Controllers\API\HousekeepingDoorLockController;
use App\Http\Controllers\SuperAdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/api', [APIController::class, 'example']);
Route::get('work-order', [APIController::class, 'workOrder']);

Route::post('order', [APIController::class,'takeOrder']);

//DOOR LOCK UID API'S
Route::post('/add-door-key', [APIController::class, 'apiUID']);
Route::post('/door-logs', [APIController::class, 'doorLogs']);

//SHARE DOOR LOCK API
Route::get('key-id', [APIController::class, 'keys']);


Route::post('inventory', [APIController::class, 'items']);


//ANDROID APP API
Route::post('loginMobile', [MobileAPIController::class, 'loginMobile']);


Route::middleware(['auth:api_token'])->group(function(){
    
    Route::get('task-assigned', [TaskController::class, 'displayTask']);
    Route::get('in-progress', [TaskController::class, 'inProgress']);

    //UPDATING STATUS
    Route::post('accept-task', [TaskController::class, 'acceptTask']);
    Route::post('complete-task', [TaskController::class, 'completeTask']);

    Route::get('user', [MobileAPIController::class, 'index']);
    Route::post('logout', [MobileAPIController::class, 'logout']);
});


//HOTEL 1 API
Route::post('add-room-details', [HOTEL1APIController::class, 'addRoomDetails']);
Route::post('update-room-details', [HOTEL1APIController::class, 'updateRoomDetails']);
Route::post('update-status', [HOTEL1APIController::class, 'updateStatus']);
Route::post('delete-room-details', [HOTEL1APIController::class, 'deleteRoom']);

//GET THE HOTEL 1 USERS
Route::post('get-h1-users', [HOTEL1APIController::class, 'getUsers']);

//DOOR LOCK FOR HOUSEKEEPING 
Route::post('housekeeping-add-doorkey', [HousekeepingDoorLockController::class, 'addDoorKey']);
Route::post('housekeeping-door-logs', [HousekeepingDoorLockController::class, 'doorLogs']);
//SHARE DOOR LOCK KEYS
Route::get('door-keys', [HousekeepingDoorLockController::class, 'doorKeys']);


//LOGISTICS
Route::post('logistics', [APILogisticsController::class, 'logistics']);


//FROM SUPER ADMIN
Route::post('super-add-user', [SuperAdminController::class, 'addUsers']);
Route::post('super-edit-user', [SuperAdminController::class, 'editUsers']);
Route::post('super-delete-user', [SuperAdminController::class, 'deleteUsers']);