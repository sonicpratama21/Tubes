<label for="kos_id">Kos</label>
<select name="kos_id" id="kos_id" required>
    <option value="">-- Pilih kos --</option>
    @foreach ($daftarKos as $kos)
        <option value="{{ $kos->id }}"
            {{ old('kos_id', $kamar->kos_id ?? '') == $kos->id ? 'selected' : '' }}>
            {{ $kos->nama_kos }}
        </option>
    @endforeach
</select>

<label for="nama_kamar">Nama Kamar</label>
<input type="text" name="nama_kamar" id="nama_kamar" value="{{ old('nama_kamar', $kamar->nama_kamar ?? '') }}" required>

<label for="fasilitas">Fasilitas Kamar</label>
<textarea name="fasilitas" id="fasilitas" rows="3">{{ old('fasilitas', $kamar->fasilitas ?? '') }}</textarea>

<label for="ukuran_kamar">Ukuran Kamar</label>
<input type="text" name="ukuran_kamar" id="ukuran_kamar" placeholder="contoh: 3x4 m"
       value="{{ old('ukuran_kamar', $kamar->ukuran_kamar ?? '') }}" required>

<label for="harga">Harga</label>
<input type="number" name="harga" id="harga" min="0" value="{{ old('harga', $kamar->harga ?? '') }}" required>

<label for="slot_tersedia">Slot Tersedia</label>
<input type="number" name="slot_tersedia" id="slot_tersedia" min="0"
       value="{{ old('slot_tersedia', $kamar->slot_tersedia ?? 0) }}" required>

<br><br>
<button type="submit">Simpan</button>
<a href="{{ route('kamar.index') }}">Batal</a>