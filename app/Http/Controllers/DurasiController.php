<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Durasi;

class DurasiController extends Controller
{
    public function index()
    {
        return Durasi::all();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_durasi' => 'required|max:255',
            'waktu_durasi' => 'required|max:255',
            'harga_durasi' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages())->setStatusCode(422);
        }

        $payload = $validator->validated();

        Durasi::create([
            'jenis_durasi' => $payload['jenis_durasi'],
            'waktu_durasi' => $payload['waktu_durasi'],
            'harga_durasi' => $payload['harga_durasi'],
        ]);

        return response()->json([
            'msg' => 'Durasi berhasil dibuat'
        ]);
    }

    public function show($id)
    {
        return Durasi::find($id);
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'jenis_durasi' => 'required|max:255',
                'waktu_durasi' => 'required|max:255',
                'harga_durasi' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->messages())->setStatusCode(422);
            }

            $payload = $validator->validated();

            Durasi::where('id_durasi', $id)->update([
                'jenis_durasi' => $payload['jenis_durasi'],
                'waktu_durasi' => $payload['waktu_durasi'],
                'harga_durasi' => $payload['harga_durasi']
            ]);

            return response()->json([
                'msg' => 'Berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'msg' => $e->getMessage()
            ]);
        }
    }

    // public function delete($id){
    //     // Cari produk berdasarkan ID
    //     $durasi = Durasi::where('id_durasi', $id)->first();
    
    //     // Jika produk ditemukan, hapus produk tersebut
    //     if($durasi){
    //         Durasi::where('id_durasi', $id)->delete();
    
    //         return response()->json([
    //             'msg'=> 'Berhasil dihapus'
    //         ], 200);
    //     } else {
    //         // Jika produk tidak ditemukan, kembalikan respons error
    //         return response()->json([
    //             'msg'=> 'tidak ditemukan'
    //         ], 404);
    //     }
    // }
}
