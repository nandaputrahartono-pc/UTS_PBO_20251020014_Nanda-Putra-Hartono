<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UkmKsmController extends Controller
{
    public function index()
    {
        $data = session('ukm_ksm', []);

        if (empty($data)) {
            $data = [
                [
                    'kode' => 'UKM001',
                    'nama' => 'UKM Siber & Networking',
                    'kategori' => 'UKM',
                    'lokasi' => 'Gedung Student Center Lt. 2',
                    'jumlah' => 30,
                    'kondisi' => 'Aktif',
                ],
                [
                    'kode' => 'KSM001',
                    'nama' => 'KSM Web Development',
                    'kategori' => 'KSM',
                    'lokasi' => 'Lab Informatika 1',
                    'jumlah' => 25,
                    'kondisi' => 'Aktif',
                ],
                [
                    'kode' => 'UKM002',
                    'nama' => 'UKM Fotografi',
                    'kategori' => 'UKM',
                    'lokasi' => 'Gedung Student Center Lt. 1',
                    'jumlah' => 20,
                    'kondisi' => 'Aktif',
                ],
            ];

            session(['ukm_ksm' => $data]);
        }

        return view('ukm_ksm.index', ['ukm_ksm' => $data]);
    }

    public function create()
    {
        return view('ukm_ksm.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'jumlah' => 'required|integer|min:0',
            'kondisi' => 'required',
        ]);

        $data = session('ukm_ksm', []);

        foreach ($data as $item) {
            if ($item['kode'] == $request->kode) {
                return back()->withInput()->with('error', 'Kode sudah digunakan.');
            }
        }

        $data[] = [
            'kode' => $request->kode,
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'jumlah' => $request->jumlah,
            'kondisi' => $request->kondisi,
        ];

        session(['ukm_ksm' => $data]);

        return redirect()->route('ukm-ksm.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($kode)
    {
        $data = session('ukm_ksm', []);

        foreach ($data as $item) {
            if ($item['kode'] == $kode) {
                return view('ukm_ksm.show', ['item' => $item]);
            }
        }

        return redirect()->route('ukm-ksm.index')->with('error', 'Data tidak ditemukan.');
    }

    public function edit($kode)
    {
        $data = session('ukm_ksm', []);

        foreach ($data as $item) {
            if ($item['kode'] == $kode) {
                return view('ukm_ksm.edit', ['item' => $item]);
            }
        }

        return redirect()->route('ukm-ksm.index')->with('error', 'Data tidak ditemukan.');
    }

    public function update(Request $request, $kode)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'jumlah' => 'required|integer|min:0',
            'kondisi' => 'required',
        ]);

        $data = session('ukm_ksm', []);

        foreach ($data as $i => $item) {
            if ($item['kode'] == $kode) {
                $data[$i]['nama'] = $request->nama;
                $data[$i]['kategori'] = $request->kategori;
                $data[$i]['lokasi'] = $request->lokasi;
                $data[$i]['jumlah'] = $request->jumlah;
                $data[$i]['kondisi'] = $request->kondisi;

                session(['ukm_ksm' => $data]);

                return redirect()->route('ukm-ksm.index')->with('success', 'Data berhasil diperbarui.');
            }
        }

        return redirect()->route('ukm-ksm.index')->with('error', 'Data tidak ditemukan.');
    }

    public function destroy($kode)
    {
        $data = session('ukm_ksm', []);

        foreach ($data as $i => $item) {
            if ($item['kode'] == $kode) {
                unset($data[$i]);
                $data = array_values($data);

                session(['ukm_ksm' => $data]);

                return redirect()->route('ukm-ksm.index')->with('success', 'Data berhasil dihapus.');
            }
        }

        return redirect()->route('ukm-ksm.index')->with('error', 'Data tidak ditemukan.');
    }
}
