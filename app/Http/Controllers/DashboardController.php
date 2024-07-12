<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lhp;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index()
   {
    $lhps = lhp::all();
    $jumlahLhpTotal = Lhp::count();
    $jumlahLhpEvlap = Lhp::where('status_lhp_id', 'STT02')->count();
    $jumlahLhpRevisi = Lhp::where('status_lhp_id', 'STT04')->count();
    $jumlahLhpSelesai = Lhp::where('status_lhp_id', 'STT01')->count();

    return view(
        'dashboard', [
        'jumlahLhpTotal' => $jumlahLhpTotal,
        'jumlahLhpEvlap' => $jumlahLhpEvlap,
        'jumlahLhpRevisi' => $jumlahLhpRevisi,
        'jumlahLhpSelesai' => $jumlahLhpSelesai,
        'lhp' => $lhps
    ]);
   }

   public function dashboard()
   {
    $lhps = Lhp::where('id_user', Auth::id())->get();
    $jumlahLhpTotal = $lhps -> count();
    $jumlahLhpEvlap = $lhps -> where('status_lhp_id', 'STT02')->count();
    $jumlahLhpRevisi = $lhps -> where('status_lhp_id', 'STT04')->count();
    $jumlahLhpSelesai = $lhps -> where('status_lhp_id', 'STT01')->count();

    return view(
        'dashboard_user', [
        'jumlahLhpTotal' => $jumlahLhpTotal,
        'jumlahLhpEvlap' => $jumlahLhpEvlap,
        'jumlahLhpRevisi' => $jumlahLhpRevisi,
        'jumlahLhpSelesai' => $jumlahLhpSelesai,
        'lhp' => $lhps
    ]);
   }
}
