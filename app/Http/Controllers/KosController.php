<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\User;
use Illuminate\Http\Request;

class KosController extends Controller
{
    public function index()
    {
        $daftarKos = Kos::with('pemilik')->withCount('kamar')->latest()->get();
        return view('kos.index', compact('daftarKos'));
    }

    public function create()
    {
        $daftarPemilik = User::orderBy('name')->get();
        return view('kos.create', compact('daftarPemilik'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_pemilik' => 'required|exists:users,id',
            'nama_kos'   => 'required|string|max:255',
            'daerah_kos' => 'required|string|max:255',
            'harga'      => 'required|integer|min:0',
            'fasilitas'  => 'nullable|string',
        ]);

        Kos::create($data);

        return redirect()->route('kos.index')->with('success', 'Data kos berhasil ditambahkan.');
    }

    public function edit(Kos $kos)
    {
        $daftarPemilik = User::orderBy('name')->get();
        return view('kos.edit', compact('kos', 'daftarPemilik'));
    }

    public function update(Request $request, Kos $kos)
    {
        $data = $request->validate([
            'id_pemilik' => 'required|exists:users,id',
            'nama_kos'   => 'required|string|max:255',
            'daerah_kos' => 'required|string|max:255',
            'harga'      => 'required|integer|min:0',
            'fasilitas'  => 'nullable|string',
        ]);

        $kos->update($data);

        return redirect()->route('kos.index')->with('success', 'Data kos berhasil diperbarui.');
    }

    public function destroy(Kos $kos)
    {
        $kos->delete(); // kamar ikut terhapus (cascadeOnDelete)
        return redirect()->route('kos.index')->with('success', 'Data kos berhasil dihapus.');
    }
}