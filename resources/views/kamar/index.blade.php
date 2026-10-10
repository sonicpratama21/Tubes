@extends('layouts.app')
@section('title', 'Data Kamar')

@section('content')
    <h1>Data Kamar</h1>
    <a class="btn" href="{{ route('kamar.create') }}">+ Tambah Kamar</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kos</th>
                <th>Nama Kamar</th>
                <th>Fasilitas</th>
                <th>Ukuran</th>
                <th>Harga</th>
                <th>Slot Tersedia</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($daftarKamar as $kamar)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kamar->kos->nama_kos ?? '-' }}</td>
                    <td>{{ $kamar->nama_kamar }}</td>
                    <td>{{ $kamar->fasilitas }}</td>
                    <td>{{ $kamar->ukuran_kamar }}</td>
                    <td>Rp {{ number_format($kamar->harga, 0, ',', '.') }}</td>
                    <td>
                        {{ $kamar->slot_tersedia > 0 ? $kamar->slot_tersedia . ' slot' : 'Penuh' }}
                    </td>
                    <td>
                        <a href="{{ route('kamar.edit', $kamar) }}">Edit</a>
                        <form action="{{ route('kamar.destroy', $kamar) }}" method="POST" style="display:inline"
                              onsubmit="return confirm('Hapus kamar ini?')">
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