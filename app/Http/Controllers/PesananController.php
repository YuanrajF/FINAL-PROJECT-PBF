<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Validator;

class PesananController extends Controller
{
    public function index()
    {
        return Pesanan::all();
    }
    public function store(Request $request)
    {
        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'id_layanan' => 'required|exists:layanans,id_layanan',
            'id_durasi' => 'required|exists:durasis,id_durasi',
            'atur_pesanan' => 'required|exists:atur_pesanans,atur_pesanan',
            'id_item_pesanan' => 'required|exists:item_pesanans,id_item_pesanan',
            'harga_pesanan' => 'required|numeric',
            'nota_satuan' => 'required'
        ]);

        // Jika validasi gagal, kembalikan pesan error dengan status kode 422
        if ($validator->fails()) {
            return response()->json($validator->messages())->setStatusCode(422);
        }

        // Memvalidasi data yang telah divalidasi
        $payload = $validator->validated();

        // Menyimpan pesanan baru ke dalam database
        $Pesanan = pesanan::create([
            'id_pelanggan' => $payload['id_pelanggan'],
            'id_layanan' => $payload['id_layanan'],
            'id_durasi' => $payload['id_durasi'],
            'atur_pesanan' => $payload['atur_pesanan'],
            'id_item_pesanan' => $payload['id_item_pesanan'],
            'harga_pesanan' => $payload['harga_pesanan'],
            'nota_satuan' => $payload ['nota_satuan']
        ]);

        return response()->json($Pesanan); // Memberikan respons dengan data pesanan yang baru dibuat
    }

    public function show($id)
    {
        // Mengambil pesanan berdasarkan ID
        $pesanan = Pesanan::find($id);

        if (!$pesanan) {
            return response()->json(['message' => 'Pesanan tidak ditemukan'], 404);
        }

        return response()->json($pesanan);
    }

    public function update(Request $request, $id)
    {
        // Validasi input untuk update
        $request->validate([
            'id_pelanggan' => 'exists:pelanggans,id_pelanggan',
            'id_layanan' => 'exists:layanans,id_layanan',
            'id_durasi' => 'exists:durasis,id_durasi',
            'atur_pesanan' => 'exists:atur_pesanans,atur_pesanan',
            'harga_pesanan' => 'numeric', // tambahan validasi untuk 'kilo' jika diperlukan
            'nota_pesanan' => 'required|max:255'
        ]);

        // Mencari pesanan berdasarkan ID
        $pesanan = Pesanan::find($id);

        if (!$pesanan) {
            return response()->json(['message' => 'Pesanan tidak ditemukan'], 404);
        }

        // Melakukan update pesanan
        $pesanan->update($request->all());

        return response()->json($pesanan);
    }

    public function destroy($id)
    {
        // Menghapus pesanan berdasarkan ID
        $deleted = Pesanan::destroy($id);

        if (!$deleted) {
            return response()->json(['message' => 'Pesanan tidak ditemukan'], 404);
        }

        return response()->json(['message' => 'Pesanan berhasil dihapus']);
    }
}
