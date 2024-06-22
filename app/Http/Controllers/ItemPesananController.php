<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemPesanan;
use Illuminate\Support\Facades\Validator;

class ItemPesananController extends Controller
{
    public function index()
    {
        return ItemPesanan::all();
    }

    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'nama_item' => 'required|max:255',
        'harga_item' => 'required|numeric',
      ]);

      if($validator->fails()) {
        return response()->json($validator->messages())->setStatusCode(422);
      }

      return ItemPesanan::create($request->all());
    }
}
