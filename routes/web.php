<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    // 1. Hitung semua statistik penting
    $total_projects = Project::count();
    $total_tasks = Task::count();

    // Hitung tugas yang statusnya spesifik 'complete'
    $tasks_completed = Task::where('status', 'complete')->count();

    // Hitung berapa banyak user yang jabatannya 'staff'
    $total_staff = User::where('role', 'staff')->count();

    // 2. Lempar semua data hitungan ini ke halaman dashboard
    return view('dashboard', compact('total_projects', 'total_tasks', 'tasks_completed', 'total_staff'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/absensi', function () {
        return view('absensi');
    })->name('absensi');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/clock_in', [AbsensiController::class, 'clock_in'])->name('clock_in');
    Route::post('/clock_out', [AbsensiController::class, 'clock_out'])->name('clock_out');
    Route::resource('project', ProjectController::class);
    Route::resource('tasks', TaskController::class);
});



require __DIR__ . '/auth.php';
