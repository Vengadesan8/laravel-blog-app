<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[PostController::class,'index']);
Route::get('/blog/{post}',[PostController::class,'show'])->name('blog.show');
Route::middleware(['auth','admin'])->group(function(){
    Route::get('/admin/dashboard',[PostController::class,'dashboard'])->name('dashboard');
    Route::get('/dashboard',[PostController::class,'dashboard'])->name('dashboard');
    Route::get('/create',[PostController::class,'create'])->name('create');
    Route::post('/store',[PostController::class,'store']);
    Route::get('/edit/{post}',[PostController::class,'edit']);
    Route::put('/update/{post}',[PostController::class,'update']);
    Route::delete('/delete/{post}',[PostController::class,'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
