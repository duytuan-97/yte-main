<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CallCommandViaCodeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Customer\PharmaceuticalAndMedicalController;
use App\Http\Controllers\Customer\HomeController as CustomerHomeController;

// admin
// Route::prefix('admin')->group(function () {
//     Route::get('/index', [AdminHomeController::class, 'index'])->name('admin.index');
//     Route::get('/login', [AdminHomeController::class, 'login'])->name('admin.login');
//     Route::get('/register', [AdminHomeController::class, 'register'])->name('admin.register');
//     Route::get('/forgot-password', [AdminHomeController::class, 'forgotPass'])->name('admin.forgot_password');
// });

//call Command
Route::get('/clear_cache', [CallCommandViaCodeController::class, 'clear_cache']);
Route::get('/create_storage', [CallCommandViaCodeController::class, 'create_storage']);
// Route::get('/create_folder_storage', [CallCommandViaCodeController::class, 'create_folder_storage']);

//News
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/chi-tiet-tin-tuc/tieu-de-tin-tuc/{id}', [NewsController::class, 'newsDetail'])->name('news.detail');
// Route::get('/chi-tiet-tin-tuc/tieu-de-tin-tuc', [NewsController::class, 'newsDetail'])->name('news.detail');
// customer

// index chung customer
Route::get('/', [CustomerHomeController::class, 'index'])->name('customer.index');
// index chung dược và y tế
// Route::get('/pharmaceutical-and-medical', [PharmaceuticalAndMedicalController::class, 'index'])->name('customer.pharmaceuticalandmedical.index');
Route::get('/dich-vu', [PharmaceuticalAndMedicalController::class, 'index'])->name('customer.pharmaceuticalandmedical.index');
// index của dược
Route::get('/dich-vu/duoc', [PharmaceuticalAndMedicalController::class, 'medicineIndex'])->name('customer.medicine.index');
// chi tiết sản phẩm
Route::get('/chi-tiet-san-pham/vien-uong-cai-thien-giam-suy-nhuoc-co-the-blsh/{id}', [PharmaceuticalAndMedicalController::class, 'PharmaceuticalDetail'])->name('customer.pharmaceuticalandmedical.pharmaceutical_detail');
Route::get('/dang-thuc-hien', [PharmaceuticalAndMedicalController::class, 'dangThucHien'])->name('customer.dangthuchien');
