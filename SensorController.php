<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SensorData;
use Illuminate\Support\Facades\Validator;

class SensorController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi data yang masuk dari ESP32
        $validator = Validator::make($request->all(), [
            'device_id'      => 'sometimes|string|max:50',
            'tds_value'      => 'required|numeric',
            'moisture_value' => 'required|numeric',
        ]);

        // Jika data tidak sesuai (misal dikirim huruf, bukan angka)
        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Data tidak valid',
                'errors'  => $validator->errors()
            ], 400);
        }

        // 2. Simpan data ke Database
        $sensor = SensorData::create([
            'device_id'      => $request->input('device_id', 'ESP32_MAIN'), // Default jika tidak dikirim
            'tds_value'      => $request->tds_value,
            'moisture_value' => $request->moisture_value,
        ]);

        // 3. Berikan respon sukses ke ESP32
        return response()->json([
            'status'  => 'success',
            'message' => 'Data berhasil disimpan',
            'data'    => $sensor
        ], 201);
    }
}