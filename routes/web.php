<?php

use App\Http\Controllers\Konten;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\viewController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [viewController::class, 'index'])->name('beranda');


// Gunakan hanya satu controller, misalnya ContactController
Route::get('/contact/send', [EmailController::class, 'sendWelcomeEmail'])->name('contact.send');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('konten', KontenController::class);
    Route::post('/judul/create', [KontenController::class, 'storeJudul'])->name('create.judul');
    Route::put('/judul/update/{id}', [KontenController::class, 'updateJudul'])->name('update.judul');
    Route::delete('/judul/{id}', [KontenController::class, 'deleteJudul'])->name('delete.judul');
    Route::post('/kategori/create', [KontenController::class, 'storeKategori'])->name('create.kategori');
    Route::put('/kategori/update/{id}', [KontenController::class, 'updateKategori'])->name('update.kategori');

    Route::delete('/kategori/{id}', [KontenController::class, 'deleteKategori'])->name('delete.kategori');
});



// Route::get('login', [LoginController::class, 'showLogin Form'])->name('login.form');
// Route::post('login', [LoginController::class, 'login'])->name('login');
// Route::get('/grid', [LoginController::class, 'grid'])->name('grid');

// //ketika sdh login
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('auth')->name('dashboard');

// //kl ga login gbs masuk
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function(){
//         return view('dashboard');
//     });
// });

// //logout
// Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// //kontak
// Route::post('/send-message', [ContactController::class, 'send'])->name('contact.send');
// Route::post('/send-email', [ContactController::class, 'sendEmail'])->name('send.email');


// //form
// Route::post('/send-email', function (\Illuminate\Http\Request $request) {
//     $data = $request->validate([
//         'full-name' => 'required|string|max:255',
//         'email' => 'required|email',
//         'subject' => 'required|string|max:255',
//         'message' => 'required|string',
//     ]);

//     // Kirim Email
//     Mail::raw($data['message'], function ($mail) use ($data) {
//         $mail->to('gadismp04@gmail.com')
//             ->subject($data['subject'])
//             ->from($data['email'], $data['full-name']);
//     });

//     return back()->with('success', 'Email berhasil dikirim!');
// });
