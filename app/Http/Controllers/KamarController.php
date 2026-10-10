<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kos;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    private function rules(): array
    {
        return [
            'kos_id'        => 'required|exists:kos,id',
            'nama_kamar'    => 'required|string|max:255',
            'fasilitas'     => 'nullable|string',
            'ukuran_kamar'  => 'required|string|max:50',
            'harga'         => 'required|integer|min:0',
            'slot_tersedia' => 'required|integer|min:0',
        ];
    }

    public function index()
    {
        $daftarKamar = Kamar::with('kos')->latest()->get();
        return view('kamar.index', compact('daftarKamar'));
    }

    public function create()
    {
        $daftarKos = Kos::orderBy('nama_kos')->get();
        return view('kamar.create', compact('daftarKos'));
    }

    public function store(Request $request)
    {
        Kamar::create($request->validate($this->rules()));

        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil ditambahkan.');
    }

    public function edit(Kamar $kamar)
    {
        $daftarKos = Kos::orderBy('nama_kos')->get();
        return view('kamar.edit', compact('kamar', 'daftarKos'));
    }

    public function update(Request $request, Kamar $kamar)
    {
        $kamar->update($request->validate($this->rules()));

        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil diperbarui.');
    }

    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil dihapus.');
    }
}