<?php

namespace App\Http\Controllers;
use App\Models\Pegawai;
use App\Models\Post;
use Illuminate\Http\Request;

class PegawaiPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawais = Pegawai::get();
        return view('data_pegawai', ['pegawais' => $pegawais]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambah_pegawai');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nip' => 'required|unique:pegawais',
            'role' => 'required|in:anggota_tim,ketua_tim,penanggung_jawab,wakil_penanggung_jawab,pengendali_teknis,anggota_tim_pendukung',
        ]);

        Pegawai::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'role' => $request->role,
        ]);

        return redirect('/datapegawai')->with('success', 'Pegawai berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pegawai = Pegawai::find($id);

        return view('edit_pegawai', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'nip' => 'required|unique:pegawais,nip,'.$id,
            'role' => 'required|in:anggota_tim,ketua_tim,penanggung_jawab,wakil_penanggung_jawab,pengendali_teknis,anggota_tim_pendukung',
        ]);

        $pegawai = Pegawai::find($id);

        if (!$pegawai) {
            return redirect('/datapegawai')->with('error', 'Pegawai tidak ditemukan.');
        }

        $pegawai->update([
            'name' => $request->name,
            'nip' => $request->nip,
            'role' => $request->role,
        ]);

        return redirect('/datapegawai')->with('success', 'Pegawai berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect('/datapegawai')->with('success', 'Pegawai berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $pegawai = Pegawai::where('name', 'LIKE', "%$query%")->get();
        return response()->json($pegawai);
    }
}
