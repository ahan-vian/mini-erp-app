<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function clock_in(){
        $user_id = Auth::id();
        $hari_ini = Carbon::today()->toDateString();
        $waktu_sekarang = Carbon::now();

        $cek_absen = Absensi::where('karyawan_id', $user_id)->where('tanggal', $hari_ini)->first();

        if($cek_absen){
            return redirect()->back()->with('error', 'Anda sudah melakukan absensi hari ini.');
        }
        Absensi::create([
            'karyawan_id' => $user_id,
            'tanggal' => $hari_ini,
            'clock_in' => $waktu_sekarang,
            'kehadiran' => 1
        ]);
        return redirect()->back()->with('success', 'Absensi masuk berhasil dicatat.');
    }
    
    public function clock_out(){
        $user_id = Auth::id();
        $hari_ini = Carbon::today()->toDateString();
        $waktu_sekarang = Carbon::now();

        $cek_absen = Absensi::where('karyawan_id', $user_id)->where('tanggal', $hari_ini)->first();
        if(!$cek_absen){
            return redirect()->back()->with('error', 'anda belum absen masuk pagi ini');
        }
        if($cek_absen->clock_out){
            return redirect()->back()->with('error','anda sudah clock out hari ini');
        }

        $total_jam = $waktu_sekarang->diffInHours($cek_absen->clock_in);
        $cek_absen->update([
            'clock_out' => $waktu_sekarang,
            'jam_kerja' => $total_jam
        ]);
        return redirect()->back()->with('success','Absen pulang berhasil dicatat. Terima kasih atas kerja keras Anda hari ini!');
    }
}
