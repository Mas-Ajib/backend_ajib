<?php

namespace App\Http\Controllers;

use App\Models\StatusPegawai;
use App\Http\Resources\StatusPegawaiResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class StatusPegawaiController extends Controller
{
    public function index(): JsonResponse
    {
        $statusPegawais = StatusPegawai::with('jenisPegawai')->get();
        return response()->json([
            'success' => true,
            'data' => StatusPegawaiResource::collection($statusPegawais)
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'jenis_pegawai_id' => 'required|exists:jenis_pegawais,id',
            'status_pegawai' => 'required|string'
        ]);

        $statusPegawai = StatusPegawai::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Status pegawai berhasil dibuat',
            'data' => new StatusPegawaiResource($statusPegawai->load('jenisPegawai'))
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $statusPegawai = StatusPegawai::with('jenisPegawai')->findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => new StatusPegawaiResource($statusPegawai)
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $statusPegawai = StatusPegawai::findOrFail($id);
        
        $validated = $request->validate([
            'jenis_pegawai_id' => 'required|exists:jenis_pegawais,id',
            'status_pegawai' => 'required|string'
        ]);

        $statusPegawai->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Status pegawai berhasil diupdate',
            'data' => new StatusPegawaiResource($statusPegawai->load('jenisPegawai'))
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $statusPegawai = StatusPegawai::findOrFail($id);
        $statusPegawai->delete();

        return response()->json([
            'success' => true,
            'message' => 'Status pegawai berhasil dihapus'
        ]);
    }
}