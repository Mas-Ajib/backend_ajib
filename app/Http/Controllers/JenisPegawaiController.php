<?php

namespace App\Http\Controllers;

use App\Models\JenisPegawai;
use App\Http\Resources\JenisPegawaiResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class JenisPegawaiController extends Controller
{
    public function index(): JsonResponse
    {
        $jenisPegawais = JenisPegawai::all();
        return response()->json([
            'success' => true,
            'data' => JenisPegawaiResource::collection($jenisPegawais)
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'jenis_pegawai' => 'required|string|unique:jenis_pegawais,jenis_pegawai'
        ]);

        $jenisPegawai = JenisPegawai::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Jenis pegawai berhasil dibuat',
            'data' => new JenisPegawaiResource($jenisPegawai)
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $jenisPegawai = JenisPegawai::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => new JenisPegawaiResource($jenisPegawai)
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $jenisPegawai = JenisPegawai::findOrFail($id);
        
        $validated = $request->validate([
            'jenis_pegawai' => 'required|string|unique:jenis_pegawais,jenis_pegawai,' . $id
        ]);

        $jenisPegawai->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Jenis pegawai berhasil diupdate',
            'data' => new JenisPegawaiResource($jenisPegawai)
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $jenisPegawai = JenisPegawai::findOrFail($id);
        $jenisPegawai->delete();

        return response()->json([
            'success' => true,
            'message' => 'Jenis pegawai berhasil dihapus'
        ]);
    }
}