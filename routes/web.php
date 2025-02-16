<?php

use App\Http\Controllers\GolonganController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;


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
    // Menghitung total karyawan
    $totalKaryawan = Karyawan::count();

    // Menghitung total Gmail terdaftar
    $totalGmail = Karyawan::where('email', 'like', '%@gmail.com')->count();

    // Menghitung data tidak lengkap (email atau nomor telepon kosong)
    $incompleteDataCount = Karyawan::whereNull('email')->count();

    // Menghitung kontrak hampir habis (30 hari ke depan)
    $contractEndingSoonCount = Karyawan::where('batas_usia_pensiun', '<=', now()->addDays(30))->count();

    // Total notifikasi
    $totalNotifications = $incompleteDataCount + $contractEndingSoonCount;
    
    
    
    return view('dashboard', compact(
        'totalKaryawan', 
        'totalGmail', 
        'incompleteDataCount', 
        'contractEndingSoonCount', 
        'totalNotifications'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

 
    Route::get('/karyawan', function (Request $request) {
        $columns = Schema::getColumnListing('karyawan'); // Ambil semua nama kolom dari tabel
        $query = Karyawan::query();
    
        // Filter pencarian berdasarkan nama atau NIP
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nama', 'LIKE', '%' . $search . '%')
                  ->orWhere('nip', 'LIKE', '%' . $search . '%');
        }
    
        // Filter berdasarkan gaji (tanggal_kenaikan_gaji dalam rentang waktu 6 bulan dari sekarang)
        if ($request->has('filter') && $request->filter != '') {
            $filter = $request->filter;
    
            if ($filter == 'gaji') {
                $query->whereDate('tanggal_kenaikan_gaji', '>=', now())
                      ->whereDate('tanggal_kenaikan_gaji', '<=', now()->addMonths(6));
            } elseif ($filter == 'pangkat') {
                $query->whereDate('tanggal_kenaikan_pangkat', '>=', now())
                      ->whereDate('tanggal_kenaikan_pangkat', '<=', now()->addMonths(6));
            } elseif ($filter == 'gaji dan pangkat') {
                $query->where(function ($query) {
                    $query->whereDate('tanggal_kenaikan_gaji', '>=', now())
                          ->whereDate('tanggal_kenaikan_gaji', '<=', now()->addMonths(6))
                          ->orWhereDate('tanggal_kenaikan_pangkat', '>=', now())
                          ->whereDate('tanggal_kenaikan_pangkat', '<=', now()->addMonths(6));
                });
            }
        }
    
        // Retrieve the filtered data with pagination
        $karyawans = $query->with(['jabatan', 'golongan'])->paginate(10);
    
        return view('karyawan.karyawan', compact('karyawans', 'columns'));
    })->name('karyawan.karyawan');
    

    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');


    Route::post('/karyawan/tambah', [KaryawanController::class, 'store'])->name('karyawan.store');

    Route::get('/karyawan/create', function(){
        $jabatans = Jabatan::all(); // Mengambil semua data jabatan
        $golongans = Golongan::all(); // Mengambil semua data golongan
    return view('karyawan.create', compact('jabatans', 'golongans'));
    })->name('karyawan.create');

    Route::get('/karyawan/notifyGaji/{id}', [KaryawanController::class, 'notifyGaji'])->name('karyawan.notifyGaji');
    Route::get('/karyawan/notifyPangkat/{id}', [KaryawanController::class, 'notifyPangkat'])->name('karyawan.notifyPangkat');

    Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update'); // PUT request for updating data
    Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit'); // GET request for the edit form
    Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');


    Route::get('/golongan', function (Request $request) {
        $golongans = Golongan::all();
        return view('golongan.golongan', compact('golongans'));
    })->name('golongan.golongan');

    Route::get('/golongan/create', function(){
        return view('golongan.create');
    })->name('golongan.create');

    Route::delete('/golongan/{id}', [GolonganController::class, 'destroy'])->name('golongan.destroy');
    Route::post('/golongan/tambah', [GolonganController::class, 'store'])->name('golongan.store');
    Route::get('golongan/{id}/edit', [GolonganController::class, 'edit'])->name('golongan.edit');
    Route::put('golongan/{id}', [GolonganController::class, 'update'])->name('golongan.update');


    Route::get('/jabatan', function (Request $request) {
        $jabatans = jabatan::all();
        return view('jabatan.jabatan', compact('jabatans'));
    })->name('jabatan.jabatan');

    Route::get('/jabatan/create', function(){
        return view('jabatan.create');
    })->name('jabatan.create');

    Route::delete('/jabatan/{id}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');
    Route::post('/jabatan/tambah', [JabatanController::class, 'store'])->name('jabatan.store');
    Route::get('jabatan/{id}/edit', [JabatanController::class, 'edit'])->name('jabatan.edit');
    Route::put('jabatan/{id}', [JabatanController::class, 'update'])->name('jabatan.update');
    Route::get('/update-status', [KaryawanController::class, 'updateStatus'])->name('karyawan.updateStatus');
});

require __DIR__.'/auth.php';
