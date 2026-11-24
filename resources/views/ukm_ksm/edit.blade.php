@extends('layouts.app')

@section('content')
    <h2>Edit UKM/KSM - {{ $item['kode'] }}</h2>

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ukm-ksm.update', $item['kode']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" id="kode" value="{{ $item['kode'] }}" disabled>
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $item['nama']) }}" required>
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $item['kategori']) }}" required>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $item['lokasi']) }}" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah', $item['jumlah']) }}" min="0" required>
        </div>

        <div class="form-group">
            <label for="kondisi">Kondisi</label>
            <input type="text" id="kondisi" name="kondisi" value="{{ old('kondisi', $item['kondisi']) }}" required>
        </div>

        <div class="form-action">
            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('ukm-ksm.index') }}" class="btn">Batal</a>
        </div>
    </form>
@endsection
