<?php


use App\Http\Controllers\LandingPage;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [LandingPage::class, 'landing_view'])->name('homepage');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/add_new_animation', [DashboardController::class, 'add_new_animation'])->middleware(['auth', 'verified'])->name('add_new_animation');
Route::get('/add_animation', [DashboardController::class, 'store'])->middleware(['auth', 'verified'])->name('add_animation');

Route::get('/category-animations', [DashboardController::class, 'view_category_animations'])->middleware(['auth', 'verified'])->name('category_animations');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/create_anim', [DashboardController::class, 'create_anim'])->name('create_anim');
    Route::get('/view-animation', [DashboardController::class, 'view_anim'])->name('view_animation');

    Route::put('/edit-item', [DashboardController::class, 'edit_animation'])->name('edit_item');
    Route::put('/edit-animation', [DashboardController::class, 'edit_animation_data'])->name('edit_animation');


    Route::get('/category', [DashboardController::class, 'category_view'])->name('category_view');
    Route::post('/add_category', [DashboardController::class, 'add_category'])->name('add_category');

    Route::get('/edit-category-view', [DashboardController::class, 'edit_category_view'])->name('edit_category_view');
    Route::put('/edit-category', [DashboardController::class, 'edit_category'])->name('edit_category_data');

    Route::post('/delete-animation', [DashboardController::class, 'delete_anim'])->name('delete_animation');


});



require __DIR__ . '/auth.php';
