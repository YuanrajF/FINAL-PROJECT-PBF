<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index()
    {
        return Pelanggan::all();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pelanggan' => 'required|max:255',
            'nomer_hp' => 'required|max:255',
            'alamat' => 'required|max:255'
            
        ]);

        if($validator->fails()) {
            return response()->json($validator->messages())->setStatusCode(422);
        }

        $payload = $validator->validated();

        Pelanggan::create([
            'nama_pelanggan'=> $payload['nama_pelanggan'],
            'nomer_hp'=> $payload['nomer_hp'],
            'alamat'=> $payload['alamat']
        ]);

        return response()->json([
            'msg' => 'Akun berhasil dibuat'
        ]);
    }

    public function show($id)
    {
        return Pelanggan::find($id);
    }

    public function update(Request $request, $id){
        try {
        $validator = Validator::make($request->all(),[
            'nama_pelanggan' => 'required|max:255',
            'nomer_hp' => 'required|max:255',
            'alamat' => 'required|max:255'
        ]);

        if($validator->fails()) {
            return response()->json($validator->messages())->setStatusCode(422);
        }

        $payload = $validator->validated();

        Pelanggan::where('id_pelanggan', $id)->update([
            'nama_pelanggan'=> $payload['nama_pelanggan'],
            'nomer_hp'=> $payload['nomer_hp'],
            'alamat'=> $payload['alamat']
        ]);
        
        return response()->json([
            'msg' => 'Berhasil diupdate'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'msg'=> $e->getMessage()
            ]);
    }

    
    }

    public function delete($id){
        // Cari produk berdasarkan ID
        $pelanggan = Pelanggan::where('id_pelanggan', $id)->first();
    
        // Jika produk ditemukan, hapus produk tersebut
        if($pelanggan){
            Pelanggan::where('id_pelanggan', $id)->delete();
    
            return response()->json([
                'msg'=> 'Berhasil dihapus'
            ], 200);
        } else {
            // Jika produk tidak ditemukan, kembalikan respons error
            return response()->json([
                'msg'=> 'tidak ditemukan'
            ], 404);
        }
    }
}

