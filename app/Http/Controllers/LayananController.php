<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Layanan;

class LayananController extends Controller
{
    public function index()
    {
        return Layanan::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'harga_layanan' => 'required|numeric'
        ]);

        return Layanan::create($request->all());
    }

    public function show($id)
    {
        return Layanan::find($id);
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_layanan' => 'required|max:255',
                'harga_layanan' => 'required|numeric'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->messages())->setStatusCode(422);
            }

            $payload = $validator->validated();

            Layanan::where('id_layanan', $id)->update([
                'nama_layanan' => $payload['nama_layanan'],
                'harga_layanan' => $payload['harga_layanan']
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

    public function destroy($id)
    {
        return Layanan::destroy($id);
    }
}
