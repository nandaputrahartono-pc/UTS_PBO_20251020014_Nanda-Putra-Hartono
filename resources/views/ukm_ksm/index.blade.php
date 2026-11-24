@extends('layouts.app')

@section('content')
    <div class="page-head">
        <h2>Daftar UKM/KSM</h2>
        <a href="{{ route('ukm-ksm.create') }}" class="btn btn-primary">Tambah UKM/KSM</a>
    </div>

    @if (count($ukm_ksm) == 0)
        <p>Belum ada data.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ukm_ksm as $item)
                    <tr>
                        <td>{{ $item['kode'] }}</td>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['kategori'] }}</td>
                        <td>{{ $item['lokasi'] }}</td>
                        <td>{{ $item['jumlah'] }}</td>
                        <td>{{ $item['kondisi'] }}</td>
                        <td class="aksi">
                            <a href="{{ route('ukm-ksm.show', $item['kode']) }}" class="btn">Detail</a>
                            <a href="{{ route('ukm-ksm.edit', $item['kode']) }}" class="btn">Edit</a>
                            <form action="{{ route('ukm-ksm.destroy', $item['kode']) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
