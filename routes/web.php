<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageUser\PanitiaController;
use App\Http\Controllers\ManageUser\PesertaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ScanQRController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class)->only(['index', 'store']);
    Route::post('update-profile', [DashboardController::class, 'update_profile'])->name('profile.update');
    Route::post('delete-profile', [DashboardController::class, 'delete_profile'])->name('profile.delete');

    Route::resource('manage-peserta', PesertaController::class)->only('index')->middleware('can:Lihat User');
    Route::resource('manage-panitia', PanitiaController::class)->only('index')->middleware('can:Lihat User');
    Route::resource('manage-panitia', PanitiaController::class)->only('store')->middleware('can:Tambah Panitia');
    Route::put('reset-password/{id}', ForgotPasswordController::class)->name('password.reset')->middleware('can:Reset Password');

    Route::post('bayar', [PembayaranController::class, 'proccess'])->name('pembayaran.store');
    Route::get('bayar/{id}', [PembayaranController::class, 'pembayaran'])->name('pembayaran.index');
    Route::get('bayar-sukses/{id_transaksi}', [PembayaranController::class, 'pembayaran_sukses'])->name('pembayaran.sukses');
    Route::get('cek-bayar/{order_id}', [PembayaranController::class, 'cek_pembayaran'])->name('pembayaran.cek');

    Route::resource('scan-qr', ScanQRController::class)->only(['index', 'show'])->middleware('can:Scan QR');

    Route::delete('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

require __DIR__ . '/auth.php';
