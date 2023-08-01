<?php
use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PublishCompanyController;
use App\Http\Controllers\RoleController;

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
Route::get('/', function() {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthManager::class, 'login'])->name('login');

Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/get-token', [AuthManager::class, 'token'])->name('active');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
// Route::post('/token-form', [AuthManager::class, 'tokenPost'])->name('token_form');


Route::post('/admin/login', [AdminController::class, 'loginPost'])->name('admin.post');
Route::middleware([AdminAuthMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
    Route::get('/admin/memberlist', [AdminController::class, 'memberlist'])->name('admin.memberlist');
    Route::get('/admin/memberlist/edit', [AdminController::class, 'editmemberlist'])->name('admin.memberlist.edit');
    Route::get('/admin/user/delete/{id}', [AdminController::class, 'deleteuserlist'])->name('admin.userlist.delete');
    Route::get('/admin/memberlist/edit', [AdminController::class, 'editmemberlist'])->name('admin.memberlist.edit');
    Route::get('/admin/user/edit/{id}', [AdminController::class, 'edituserlist'])->name('admin.userlist.user');
    Route::post('/admin/user/edit', [AdminController::class, 'edituserlistpost'])->name('admin.userlist.userpost');
    Route::get('/admin/userlist', [AdminController::class, 'userlist'])->name('admin.userlist');
//    ->middleware('permission:full admin.userlist');
});
Route::group(['prefix'=>'book','middleware'=>'admin'], (function () {
    Route::get('/book-index', [BookController::class, 'index'])->name('admin.book.index');
    Route::get('/book-delete/{id}', [BookController::class, 'delete'])->name('admin.book.delete');
    Route::post('/book-edit/{id}', [BookController::class, 'edit'])->name('admin.book.edit');
    Route::post('/book-update/{id}', [BookController::class, 'update'])->name('admin.book.update');
    Route::get('/book-add', [BookController::class, 'create'])->name('admin.book.create');
    Route::post('/book-store', [BookController::class,'store'])->name('book.store');
    Route::get('/book-show/{id}', [BookController::class,'show'])->name('admin.book.show');
}));
Route::group(['prefix'=>'category','middleware'=>'admin'], (function () {
    Route::get('/category-index', [CategoryController::class, 'index'])->name('admin.category.index')->middleware('permission:full admin.userlist');
    Route::get('/category-delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.index.delete');
    Route::get('/category-edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/category-update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/category-add', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category-store', [CategoryController::class,'store'])->name('admin.category.store');
    Route::get('/category-show/{id}', [CategoryController::class,'show'])->name('admin.category.show');
}));
Route::group(['prefix'=>'block','middleware'=>'admin'], (function () {
    Route::get('/block-index', [BlockController::class, 'index'])->name('admin.block.index');
    Route::get('/block-delete/{id}', [BlockController::class, 'delete'])->name('admin.block.delete');
    Route::get('/block-edit/{id}', [BlockController::class, 'edit'])->name('admin.block.edit');
    Route::post('/block-update/{id}', [BlockController::class, 'update'])->name('admin.block.update');
    Route::get('/block-add', [BlockController::class, 'create'])->name('admin.block.create');
    Route::post('/block-store', [BlockController::class,'store'])->name('admin.block.store');
    Route::get('/block-show/{id}', [BlockController::class,'show'])->name('admin.block.show');
}));
Route::group(['prefix'=>'publish_company','middleware'=>'admin'], (function () {
    Route::get('/publishCompany-index', [PublishCompanyController::class, 'index'])
    ->name('admin.publishCompany.index');
    Route::get('/publishCompany-delete/{id}', [PublishCompanyController::class, 'delete'])
    ->name('admin.publishCompany.delete');
    Route::get('/publishCompany-edit/{id}', [PublishCompanyController::class, 'edit'])
    ->name('admin.publishCompany.edit');
    Route::post('/publishCompany-update/{id}', [PublishCompanyController::class, 'update'])
    ->name('admin.publishCompany.update');
    Route::get('/publishCompany-add', [PublishCompanyController::class, 'create'])
    ->name('admin.publishCompany.create');
    Route::post('/publishCompany-store', [PublishCompanyController::class,'store'])
    ->name('admin.publishCompany.store');
    Route::get('/publishCompany-show/{id}', [PublishCompanyController::class,'show'])
    ->name('admin.publishCompany.show');
}));
Route::group(['prefix'=>'role','middleware'=>'admin'], (function () {
    Route::get('/role-index', [RoleController::class, 'index'])->name('admin.role.index');
    Route::get('/role-delete/{id}', [RoleController::class, 'delete'])->name('admin.role.delete');
    Route::get('/role-edit/{id}', [RoleController::class, 'edit'])->name('admin.role.edit');
    Route::post('/role-update/{id}', [RoleController::class, 'update'])->name('admin.role.update');
    Route::get('/role-add', [RoleController::class, 'create'])->name('admin.role.create');
    Route::post('/role-store', [RoleController::class,'store'])->name('admin.role.store');
    Route::get('/role-show/{id}', [RoleController::class,'show'])->name('admin.role.show');
}));
Route::group(['prefix'=>'permission','middleware'=>'admin'], (function () {
    Route::get('/permission-index', [PermissionController::class, 'index'])->name('admin.permission.index');
    Route::get('/permission-delete/{id}', [PermissionController::class, 'delete'])->name('admin.permission.delete');
    Route::get('/permission-edit/{id}', [PermissionController::class, 'edit'])->name('admin.permission.edit');
    Route::post('/permission-update/{id}', [PermissionController::class, 'update'])->name('admin.permission.update');
    Route::get('/permission-add', [PermissionController::class, 'create'])->name('admin.permission.create');
    Route::post('/permission-store', [PermissionController::class,'store'])->name('admin.permission.store');
    Route::get('/permission-show/{id}', [PermissionController::class,'show'])->name('admin.permission.show');
}));

