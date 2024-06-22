<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\atur_pesanan;
class AturpesananController extends Controller
{
    public function index()
    {
        return atur_pesanan::all();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'catatan' => 'nullable|string',
            'antar_jemput' => 'required|in:iya,tidak',
            'parfum' => 'required|in:downy,kispray,repika,molto',
            'diskon' => 'nullable|in:2000,5000',
            'proses_pesanan' => 'required|in:antrian,siap ambil,belum bayar',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages())->setStatusCode(422);
        }

        $payload = $validator->validated();

        atur_pesanan::create([
            'catatan' => $payload['catatan'],
            'parfum' => $payload['parfum'],
            'antar_jemput' => $payload['antar_jemput'],
            'diskon' => $payload['diskon'],
            'proses_pesanan' => $payload['proses_pesanan'],
        ]);

        return response()->json([
            'msg' => 'atur pesanan berhasil dibuat'
        ]);
    }


}
