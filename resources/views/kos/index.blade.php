@extends('layouts.app')
@section('title', 'Data Kos')

@section('content')
    <h1>Data Kos</h1>
    <a class="btn" href="{{ route('kos.create') }}">+ Tambah Kos</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kos</th>
                <th>Pemilik</th>
                <th>Daerah</th>
                <th>Harga</th>
                <th>Fasilitas</th>
                <th>Jumlah Kamar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($daftarKos as $kos)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kos->nama_kos }}</td>
                    <td>{{ $kos->pemilik->name ?? '-' }}</td>
                    <td>{{ $kos->daerah_kos }}</td>
                    <td>Rp {{ number_format($kos->harga, 0, ',', '.') }}</td>
                    <td>{{ $kos->fasilitas }}</td>
                    <td>{{ $kos->kamar_count }}</td>
                    <td>
                        <a href="{{ route('kos.edit', $kos) }}">Edit</a>
                        <form action="{{ route('kos.destroy', $kos) }}" method="POST" style="display:inline"
                              onsubmit="return confirm('Hapus kos ini beserta semua kamarnya?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8">Belum ada data.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection