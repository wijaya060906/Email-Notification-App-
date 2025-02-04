<?php

namespace App\Console;

use App\Mail\NotifikasiKaryawan;
use App\Models\Karyawan;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $karyawans = Karyawan::whereDate('tanggal_kenaikan_pangkat', now()->addMonths(6)->toDateString())->get();

            foreach ($karyawans as $karyawan) {
                $subject = "Notifikasi Pangkat";
                $message = "Halo {$karyawan->nama}, Mohon Di persiapkan Berkas Berkas Untuk Kenaikan Pangkat nya ya agar tidak terlambat";

                Mail::to($karyawan->email)->send(new NotifikasiKaryawan($subject, $message));
            }
        })->everyMinute();

        // Notifikasi Gaji
        $schedule->call(function () {
            $karyawans = Karyawan::whereDate('tanggal_kenaikan_gaji', now()->addMonths(6)->toDateString())->get();

            foreach ($karyawans as $karyawan) {
                $subject = "Notifikasi Gaji";
                $message = "Halo {$karyawan->nama}, Mohon Di Persiapkan Berkas Berkas Untuk Kenaikan Gaji Anda ya agar tidak terlambat";

                Mail::to($karyawan->email)->send(new NotifikasiKaryawan($subject, $message));
            }
        })->everyMinute();

        $schedule->call(function () {
            \Log::info('Laravel Schedule berhasil berjalan!');
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    
}
