<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Kiloan;

class kiloanController extends Controller
{
    public function index()
    {
        return Kiloan::all();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kilo' => 'required|numeric',
            'harga_kilo' => 'required|numeric'
        ]);

        if($validator->fails()) {
            return response()->json($validator->messages())->setStatusCode(422);
        }

        $payload = $validator->validated();

        Kiloan::create([
            'kilo'=> $payload['kilo'],
            'harga_kilo'=> $payload['harga_kilo']
        ]);

        return response()->json([
            'msg' => 'Berhasil Dibuat'
        ]);
    }

    public function show($id)
    {
        return kiloan::find($id);
    }

    public function update(Request $request, $id){
        try {
        $validator = Validator::make($request->all(),[
            'kilo' => 'required|numeric',
            'harga_kilo' => 'required|numeric'
        ]);

        if($validator->fails()) {
            return response()->json($validator->messages())->setStatusCode(422);
        }

        $payload = $validator->validated();

        Kiloan::where('id', $id)->update([
            'kilo'=> $payload['kilo'],
            'harga_kilo'=> $payload['harga_kilo']
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
        $pelanggan = Kiloan::where('id_pelanggan', $id)->first();
    
        // Jika produk ditemukan, hapus produk tersebut
        if($pelanggan){
            Kiloan::where('id_pelanggan', $id)->delete();
    
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


