<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data hanya untuk pengguna dengan peran 'user'
        $users = User::where('role', 'user')->get();

        return view('data_user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambah_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nip' => 'required|unique:users',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->input('name'),
            'nip' => $request->input('nip'),
            'password' => Hash::make($request->input('password')),
            'role' => 'user', // Peran default 'user'
        ]);

        return redirect('/data_user')->with('success', 'User berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view('edit_user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'nip' => 'required|unique:users,nip,'.$id,
            'password' => 'required',
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect('/data_user')->with('error', 'User tidak ditemukan.');
        }

        $user->update([
            'name' => $request->name,
            'nip' => $request->nip,
            'password' => $request->password,
        ]);

        return redirect('/data_user')->with('success', 'User berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/data_user')->with('success', 'User berhasil dihapus.');

    }
}
