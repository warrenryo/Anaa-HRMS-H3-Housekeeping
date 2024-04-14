<?php

use App\Http\Controllers\DoorLock\DoorKeyController;
use App\Http\Controllers\DoorLock\DoorLogsController;
use App\Http\Controllers\Housekeeping\HousekeepingItemsController;
use App\Http\Controllers\Housekeeping\HousekeepingProgress;
use App\Http\Controllers\Housekeeping\HousekeepingProgressController;
use App\Http\Controllers\Housekeeping\HousekeepingWorkOrdersController;
use App\Http\Controllers\Maintenance\MaintenanceStaffController;
use App\Models\InventoryModel\InventoryItems\HousekeepingInventory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DigitalRequestController;
use App\Http\Controllers\Housekeeping\DashboardController;
use App\Http\Controllers\Housekeeping\DoorLockController;
use App\Http\Controllers\Inventory\InventoryCategoryController;
use App\Http\Controllers\Housekeeping\HousekeepingStaffController;
use App\Http\Controllers\Inventory\HousekeepingInventoryController;
use App\Http\Controllers\Housekeeping\HousekeepingRequestController;
use App\Http\Controllers\Housekeeping\RoomDetailsController;
use App\Http\Controllers\Inventory\InventoryDashboardController;
use App\Http\Controllers\Inventory\MaintenanceInventoryController;
use App\Http\Controllers\Inventory\ReorderPointsController;
use App\Http\Controllers\Logistics\LogisticsControlller;
use App\Http\Controllers\Maintenance\InventoryController;
use App\Http\Controllers\Maintenance\MaintenanceInventoryController as MaintenanceMaintenanceInventoryController;
use App\Http\Controllers\Maintenance\MaintenanceProgressController;
use App\Http\Controllers\Maintenance\MaintenanceRequestController;
use App\Http\Controllers\Maintenance\MaintenanceWorkOrderController;
use App\Http\Controllers\MobileApp\AppDashboardController;
use App\Http\Controllers\MobileApp\AppWorkOrderController;
use App\Http\Controllers\MobileApp\Maintenance\MaintenanceWorkOrderAppController;
use App\Models\HousekeepingModel\HousekeepingRequest;
use App\Models\MaintenanceModel\MaintenanceRequest;
use App\Models\MaintenanceModel\MaintenanceWorkOrder;

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
    return view('auth.login');
});

Route::get('/modules', function () {
    return view('modules');
});

//NOTIFICATION
Route::get('markUnread{id}', function ($id) {
    $notification = Auth::user()->notifications()->find($id);
    if ($notification) {
        $notification->markAsRead();
    }
    return redirect('HousekeepingAdmin/housekeeping-request-list');
});
Route::get('markAsAllRead', function () {
    Auth::user()->unreadNotifications->markAsRead();
    return redirect()->back();
});

//NOTIFICATION FOR STAFF WORK ORDERS
Route::get('housekeeper/markUnread{id}', function ($id) {
    $notification = Auth::user()->notifications()->find($id);
    if ($notification) {
        $notification->markAsRead();
    }
    return redirect('housekeeper/work-order');
});

//Users
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('users', [UserController::class, 'allUsers'])->middleware('auth', 'password.confirm');
    Route::get('register-user', [UserController::class, 'registerUser']);
    Route::post('add-user', [UserController::class, 'addUser']);
    Route::get('edit-user/id={id}', [UserController::class, 'editUser']);
    Route::put('update-user/id={id}', [UserController::class, 'updateUser']);
    Route::delete('delete-user', [UserController::class, 'deleteUser']);
});

//HOUSEKEEPER MOBILE APP ROUTE
Route::prefix('housekeeper')->middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [AppDashboardController::class, 'index']);

    //work order
    Route::get('work-order', [AppWorkOrderController::class, 'index']);
    Route::get('accept-update-status/{id}', [AppWorkOrderController::class, 'updateStatus']);
    Route::get('mark-as-completed/{id}', [AppWorkOrderController::class, 'markAsCompleted']);
    Route::get('completed-task', [AppWorkOrderController::class, 'completedTaskIndex']);
});

//MAINTENANCE MOBILE APP ROUTE
Route::prefix('maintenance')->middleware(['auth', 'verified'])->group(function(){
    Route::get('dashboard', [AppDashboardController::class, 'indexMaintenance']);

    //work order
    Route::get('work-order-maintenance', [MaintenanceWorkOrderAppController::class, 'index']);
    Route::get('accept-update-status-m/{id}', [MaintenanceWorkOrderAppController:: class, 'updateStatus']);
    Route::get('mark-as-completed-m/{id}', [MaintenanceWorkOrderAppController::class, 'markAsCompleted']);
    Route::get('completed-task-m', [MaintenanceWorkOrderAppController::class, 'completedTaskIndex']);
});


//HOUSEKEEPING MODULE ROUTE
Route::middleware(['auth', 'housekeeping'])->group(function () {
    Route::prefix('HousekeepingAdmin')->middleware(['auth', 'verified'])->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'dashboardIndex'])->name('admin.dashboard');

        //housekeeping Staff
        Route::get('/housekeepingStaff', [HousekeepingStaffController::class, 'index']);
        Route::post('/add-staff', [HousekeepingStaffController::class, 'addStaff']);
        Route::get('/staff-edit/id={id}', [HousekeepingStaffController::class, 'staffEdit']);
        Route::put('/update-staff/id={id}', [HousekeepingStaffController::class, 'updateStaff']);
        Route::delete('/delete-staff/id={id}', [HousekeepingStaffController::class, 'deleteStaff']);

        //housekeeping request
        Route::get('housekeeping-request-list', [HousekeepingRequestController::class, 'index']);
        Route::get('delete-all-exceeded', [HousekeepingRequestController::class, 'deleteExceeded']);

        //work orders
        Route::get('create-work-orders/request-code={code}', [HousekeepingWorkOrdersController::class, 'getRequestData']);
        Route::post('add-items-cart/{id}/{code}', [HousekeepingWorkOrdersController::class, 'addItemsToCart']);
        Route::post('submit-work-order/id={code}', [HousekeepingWorkOrdersController::class, 'submitWorkOrder']);
        Route::get('delete-item-cart/id={id}', [HousekeepingWorkOrdersController::class, 'deleteItemCart']);

        //Housekeeping Progress
        Route::get('housekeeping-progress', [HousekeepingProgressController::class, 'index']);
        Route::get('cancel-task/id={id}', [HousekeepingProgressController::class, 'cancelTask']);
        Route::get('delete-completed-task/id={id}', [HousekeepingProgressController::class, 'deleteCompletedTask']);

        //Inventory Items Lists
        Route::get('items-lists', [HousekeepingItemsController::class, 'index']);

        //Room Details
        Route::get('roomDetails', [RoomDetailsController::class, 'index']);

        //Door lock system
        Route::get('door-keys', [DoorLockController::class, 'index']);
        Route::put('assign-key/{id}', [DoorLockController::class, 'assignKey']);
        Route::get('door-logs', [DoorLockController::class, 'doorlogsIndex']);
        Route::get('view-logs/{room_no}', [DoorLockController::class, 'viewLogs']);
        Route::get('remove-doorkey/id={id}', [DoorLockController::class, 'removeDoorKey']);

        //ADMIN WORK ORDER
        Route::post('submit-work-order-admin', [HousekeepingWorkOrdersController::class, 'adminWorkOrder']);
    });
});

//MAINTENANCE MODULE ROUTE
Route::middleware(['auth', 'maintenance'])->group(function () {
    Route::prefix('maintenance-admin')->middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', function () {
            return view('MaintenanceAdmin.dashboard');
        });

        Route::get('maintenance-staff', [MaintenanceStaffController::class, 'index']);
        Route::post('add-maintenance-staff', [MaintenanceStaffController::class, 'addStaff']);
        Route::get('edit-maintenance-staff/id={id}', [MaintenanceStaffController::class, 'editMaintenanceStaff']);
        Route::put('update-maintenance-staff/id={id}', [MaintenanceStaffController::class, 'updateMaintenanceStaff']);
        Route::delete('delete-maintenance-staff', [MaintenanceStaffController::class, 'deleteMaintenanceStaff']);


        //maintenance request
        Route::get('maintenance-request-lists', [MaintenanceRequestController::class, 'maintenanceListsIndex']);
        Route::get('delete-all-exceeded', [MaintenanceRequestController::class, 'deleteAllExceeded']);

        //maintenance work orders
        Route::get('create-maintenance-order/request-code={code}', [MaintenanceWorkOrderController::class, 'createMaintenanceOrder']);
        Route::post('add-items/{id}/{code}', [MaintenanceWorkOrderController::class, 'addItemsToCart']);
        Route::post('submit-maintenance-work-order/id={code}', [MaintenanceWorkOrderController::class, 'submitMaintenanceWorkOrder']);

        //maintenance progress
        Route::get('maintenance-task-progress', [MaintenanceProgressController::class, 'index']);

        //maintenance Inventory
        Route::get('inventory-items', [InventoryController::class, 'index']);
    });
});

//INVENTORY MODULE ROUTE
Route::middleware(['auth', 'inventory'])->group(function () {

    Route::prefix('inventory-admin')->middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', [InventoryDashboardController::class, 'index']);

        //inventory housekeeping category
        Route::get('housekeeping-category', [InventoryCategoryController::class, 'housekeepingIndex']);
        Route::post('add-h-category', [InventoryCategoryController::class, 'addHousekeepingCategory']);
        Route::get('h-category-edit/id={id}', [InventoryCategoryController::class, 'hCategoryEdit']);
        Route::put('update-h-category/id={id}', [InventoryCategoryController::class, 'updateHCategory']);
        Route::get('delete-category/id={id}', [InventoryCategoryController::class, 'deleteCategory']);

        //inventory maintenance category
        Route::get('maintenance-category', [InventoryCategoryController::class, 'maintenanceIndex']);
        Route::post('submit-maintenance-category', [InventoryCategoryController::class, 'addMaintenanceCategory']);
        Route::put('update-category/id={id}', [InventoryCategoryController::class, 'updateMaintenaceCategory']);
        Route::get('delete-maintenance-category/id={id}', [InventoryCategoryController::class, 'deleteMaintenanceCategory']);

        //HOUSEKEEPING INVENTORY
        Route::get('housekeeping-inventory', [HousekeepingInventoryController::class, 'hInventoryIndex']);
        Route::post('add-h-item', [HousekeepingInventoryController::class, 'addItems']);
        Route::get('h-item-edit/id={id}', [HousekeepingInventoryController::class, 'itemEdit']);
        Route::put('update-h-item/id={id}', [HousekeepingInventoryController::class, 'updateItem']);
        Route::get('delete-housekeeping-category/id={id}', [HousekeepingInventoryController::class, 'deleteItem']);

        //MAINTENANCE INVENTORY
        Route::get('maintenance-inventory', [MaintenanceInventoryController::class, 'mInventoryIndex']);
        Route::post('submit-maintenance-inventory', [MaintenanceInventoryController::class, 'addMaintenanceItem']);
        Route::put('update-maintenance-inventory/id={id}', [MaintenanceInventoryController::class, 'updateMaintenance']);
        Route::delete('delete-inventory-item/id={id}', [MaintenanceInventoryController::class, 'deleteItem']);

        //REORDER POINTS
        Route::get('reorder-points', [ReorderPointsController::class, 'index']);
        Route::get('reorder-item/id={id}', [ReorderPointsController::class, 'reorderView']);
        Route::post('submit-reorder/id={id}', [ReorderPointsController::class, 'submitReorder']);
        Route::get('pending-reorder', [ReorderPointsController::class, 'pendingIndex']);
        Route::get('cancel-order/id={id}', [ReorderPointsController::class, 'cancelOrder']);
    });
});

//LOGISTICS
Route::get('logistics', [LogisticsControlller::class, 'index']);
Route::get('approve/id={id}', [LogisticsControlller::class, 'approve']);
Route::get('approved', [LogisticsControlller::class, 'approveLists']);
Route::get('on-delivery/id={id}', [LogisticsControlller::class, 'onDelivery']);
Route::get('on-delivery-index', [LogisticsControlller::class, 'ondeliveryIndex']);
Route::get('complete-request/id={id}', [LogisticsControlller::class, 'requestingComplete']);
Route::get('received/id={id}', [LogisticsControlller::class, 'received']);
Route::get('claim-now/id={id}', [LogisticsControlller::class, 'claim']);


//DOOR LOCK MODULE 
Route::middleware(['auth', 'doorLock'])->group(function () {
    Route::prefix('doorLock-admin')->middleware(['auth', 'verified'])->group(function () {

        Route::get('/dashboard', function () {

            return view('DoorLockAdmin.dashboard');
        });

        //door key lists 
        Route::get('door-key-lists', [DoorKeyController::class, 'doorKeyLists']);
        Route::put('assign-room-for-keys/id={id}', [DoorKeyController::class, 'assignRoomKeys']);
        Route::put('edit-door-key/id={id}', [DoorKeyController::class, 'editDoorKey']);
        Route::delete('delete-door-key/id={id}', [DoorKeyController::class, 'deleteDoorKey']);

        //Door logs
        Route::get('door-logs', [DoorLogsController::class, 'doorLogsIndex']);
    });
});


Route::middleware(['auth', 'verified'])->group(function () {
    //DIGITAL REQUEST CLIENT SIDE
    Route::get('digital-requests', [DigitalRequestController::class, 'index']);
    //housekeeping request
    Route::get('housekeeping-request', [DigitalRequestController::class, 'housekeepingRequest']);
    Route::post('submit-housekeeping-request', [DigitalRequestController::class, 'submitHrequest']);
    //maintenance request
    Route::get('maintenance-request', [DigitalRequestController::class, 'maintenanceRequest']);
    Route::post('submit-maintenance-request', [DigitalRequestController::class, 'submitMrequest']);
});






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
