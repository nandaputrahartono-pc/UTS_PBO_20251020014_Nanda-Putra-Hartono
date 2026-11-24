@extends('layouts.app')

@section('content')
    <h2>Detail UKM/KSM</h2>

    <table class="table table-detail">
        <tr>
            <th>Kode</th>
            <td>{{ $item['kode'] }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $item['nama'] }}</td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td>{{ $item['kategori'] }}</td>
        </tr>
        <tr>
            <th>Lokasi</th>
            <td>{{ $item['lokasi'] }}</td>
        </tr>
        <tr>
            <th>Jumlah</th>
            <td>{{ $item['jumlah'] }}</td>
        </tr>
        <tr>
            <th>Kondisi</th>
            <td>{{ $item['kondisi'] }}</td>
        </tr>
    </table>

    <div class="form-action">
        <a href="{{ route('ukm-ksm.edit', $item['kode']) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('ukm-ksm.index') }}" class="btn">Kembali</a>
        <form action="{{ route('ukm-ksm.destroy', $item['kode']) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
@endsection
