<label for="id_pemilik">Pemilik</label>
<select name="id_pemilik" id="id_pemilik" required>
    <option value="">-- Pilih pemilik --</option>
    @foreach ($daftarPemilik as $pemilik)
        <option value="{{ $pemilik->id }}"
            {{ old('id_pemilik', $kos->id_pemilik ?? '') == $pemilik->id ? 'selected' : '' }}>
            {{ $pemilik->name }}
        </option>
    @endforeach
</select>

<label for="nama_kos">Nama Kos</label>
<input type="text" name="nama_kos" id="nama_kos" value="{{ old('nama_kos', $kos->nama_kos ?? '') }}" required>

<label for="daerah_kos">Daerah Kos</label>
<input type="text" name="daerah_kos" id="daerah_kos" value="{{ old('daerah_kos', $kos->daerah_kos ?? '') }}" required>

<label for="harga">Harga (per bulan)</label>
<input type="number" name="harga" id="harga" min="0" value="{{ old('harga', $kos->harga ?? '') }}" required>

<label for="fasilitas">Fasilitas</label>
<textarea name="fasilitas" id="fasilitas" rows="3">{{ old('fasilitas', $kos->fasilitas ?? '') }}</textarea>

<br><br>
<button type="submit">Simpan</button>
<a href="{{ route('kos.index') }}">Batal</a>