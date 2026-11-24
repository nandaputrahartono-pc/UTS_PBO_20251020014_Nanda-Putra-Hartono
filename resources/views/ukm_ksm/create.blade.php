@extends('layouts.app')

@section('content')
    <h2>Tambah UKM/KSM</h2>

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ukm-ksm.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" id="kode" name="kode" value="{{ old('kode') }}" placeholder="Contoh: UKM003" required>
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" id="kategori" name="kategori" value="{{ old('kategori') }}" placeholder="UKM atau KSM" required>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" min="0" required>
        </div>

        <div class="form-group">
            <label for="kondisi">Kondisi</label>
            <input type="text" id="kondisi" name="kondisi" value="{{ old('kondisi') }}" placeholder="Aktif atau Vakum" required>
        </div>

        <div class="form-action">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('ukm-ksm.index') }}" class="btn">Kembali</a>
        </div>
    </form>
@endsection
