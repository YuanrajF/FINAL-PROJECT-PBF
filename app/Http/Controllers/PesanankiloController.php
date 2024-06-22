<?php
namespace App\Http\Controllers;
use App\Models\PesananKilo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PesanankiloController extends Controller
{
    public function index()
    {
        return PesananKilo::all();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'id_layanan' => 'required|exists:layanans,id_layanan',
            'id_durasi' => 'required|exists:durasis,id_durasi',
            'atur_pesanan' => 'required|exists:atur_pesanans,atur_pesanan',
            'harga_kilo' => 'required|numeric',
            'nota_kiloan'=> 'required'

        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages())->setStatusCode(422);
        }

        $payload = $validator->validated();

        Pesanankilo::create([
            'id_pelanggan' => $payload['id_pelanggan'],
            'id_layanan' => $payload['id_layanan'],
            'id_durasi' => $payload['id_durasi'],
            'atur_pesanan' => $payload['atur_pesanan'],
            'harga_kilo' => $payload['harga_kilo'],
            'nota_kiloan' => $payload['nota_kiloan']
        ]);

        return response()->json([
            'msg' => 'Pesanan_kilo berhasil dibuat'
        ]);
    }


}


