<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lhp;
use App\Models\StatusLHP;
use App\Models\komentar;
use App\Models\Pegawai;
use App\Models\opd;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class lhpController extends Controller
{
    public function tambah() {
        $opds = opd::all();
        $anggotaTimList = Pegawai::where('role', 'anggota_tim')->get();
        $ketuaTimList = Pegawai::where('role', 'ketua_tim')->get();
        $penanggungJawabList = Pegawai::where('role', 'penanggung_jawab')->get();
        $wakilPJList = Pegawai::where('role', 'wakil_penanggung_jawab')->get();
        $pengendaliList = Pegawai::where('role', 'pengendali_teknis')->get();
        $anggotaPendukungList = Pegawai::where('role', 'anggota_tim_pendukung')->get();
        return view ('post', [
            'opds' => $opds,
            'anggotaTimList' => $anggotaTimList,
            'ketuaTimList' => $ketuaTimList,
            'penanggungJawabList' => $penanggungJawabList,
            'wakilPJList' => $wakilPJList,
            'pengendaliList' => $pengendaliList,
            'anggotaPendukungList' => $anggotaPendukungList
        ]);
    }

    public function simpan(Request $request) {

        $request->validate([
            'judul_lhp' => 'required',
            'tanggal_pengajuan' => 'required',
            'opd' => 'required',
            'ketua_tim' => 'required',
            'anggota_tim' => 'required',
            'penanggung_jawab'=>'required',
            'wakil_penanggung_jawab'=>'required',
            'pengendali_teknis' => 'required',
            'anggota_tim_pendukung' => 'required',
            'jenis_pengawasan' => 'required',
            'file' => 'required|mimes:pdf',
        ], [
            'judul_lhp.required' => 'Field Judul LHP harus diisi.',
            'tanggal_pengajuan.required' => 'Field Tanggal Pengajuan harus diisi.',
            'opd.required' => 'Field OPD harus diisi.',
            'ketua_tim.required' => 'Field Ketua Tim harus diisi.',
            'anggota_tim.required' => 'Field Anggota Tim harus diisi.',
            'jenis_pengawasan.required' => 'Field Jenis Pengawasan harus diisi.',
        ]);

        $userId = Auth::id();


        $lastLhpId = Lhp::latest('id_lhp')->pluck('id_lhp')->first();
        $lastLhpIdNumber = intval(substr($lastLhpId, 3));
        $formattedId = 'LHP' . str_pad($lastLhpIdNumber + 1, 4, '0', STR_PAD_LEFT);


        $ketuaTim = Pegawai::findOrFail($request->ketua_tim);
        $anggotaTimIds = $request->anggota_tim;
        $penanggungJawab = Pegawai::findOrFail($request->penanggung_jawab);
        $wakilPJ = Pegawai::findOrFail($request->wakil_penanggung_jawab);
        $pengendali = Pegawai::findOrFail($request->pengendali_teknis);
        $anggotaPendukung = Pegawai::findOrFail($request->anggota_tim_pendukung);


        $file = $request->file('file');
        $originalFileName = $file->getClientOriginalName();
        $file->storeAs('public/lhp_files', $originalFileName);

        $lhp = new Lhp();
        $lhp->judul_lhp = $request->judul_lhp;
        $lhp->tanggal_pengajuan = $request->tanggal_pengajuan;
        $lhp->opd_id = $request->opd;
        $lhp->ketua_tim = $ketuaTim->name;
        $lhp->anggota_tim = Pegawai::whereIn('id', $anggotaTimIds)->pluck('name')->implode(', ');
        $lhp->penanggung_jawab = $penanggungJawab->name;
        $lhp->wakil_penanggung_jawab = $wakilPJ->name;
        $lhp->pengendali_teknis = $pengendali->name;
        $lhp->anggota_tim_pendukung = $anggotaPendukung->name;
        $lhp->jenis_pengawasan = $request->jenis_pengawasan;
        $lhp->file = $originalFileName;
        $lhp->id_lhp = $formattedId;
        $lhp->id_user = $userId;
        $lhp->save();

        Session::flash('success', 'Data berhasil disimpan.');

        return redirect('postlhp');
    }


    public function tampil(){
        $lhps = lhp::all();
        return view ('admtracking', ['lhp' => $lhps]);
    }

    public function tampiledit() {
        $lhps = lhp::all();
        return view('edit', ['lhp' => $lhps ]);
    }

    public function detail($id_lhp) {
        $lhp = lhp::find($id_lhp);
        $statuses = StatusLHP::pluck('status', 'id_status');
        return view('admdetail', compact('lhp', 'statuses'));
    }

    public function update(Request $request, $id_lhp){
        $request->validate([
            'status_lhp_id' => 'required|exists:status_lhp,id_status',
            'komentar' => 'required',
        ], [
            'status_lhp_id.required' => 'Status harus diisi.',
            'status_lhp_id.exists' => 'Status yang dipilih tidak valid.',
            'komentar.required' => 'Komentar harus diisi.',
        ]);

        $lhp = Lhp::find($id_lhp);
        $lhp->status_lhp_id = $request->status_lhp_id;
        $lhp->save();

        $komentar = new Komentar;
        $komentar->id_lhp = $lhp->id_lhp;
        $komentar->content = $request->komentar;
        $komentar->save();

        return redirect('editlhp');
    }

    public function hasil()
    {
        $lhps = Lhp::whereHas('opd')->where('id_user', Auth::id())->get();
        return view('hasilp', ['lhps' => $lhps]);
    }



    public function detailuser($id_lhp){
        $lhp = lhp::find($id_lhp);
        $statuses = StatusLHP::all();
        $komentars = Komentar::where('id_lhp', $id_lhp)->get();
        return view('userdetail', compact('lhp', 'statuses', 'komentars'));
    }


}
