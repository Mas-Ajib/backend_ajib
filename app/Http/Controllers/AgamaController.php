<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Http\Resources\AgamaResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AgamaController extends Controller
{
    public function index(): JsonResponse
    {
        $agamas = Agama::all();
        return response()->json([
            'success' => true,
            'data' => AgamaResource::collection($agamas)
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'agama' => 'required|string|unique:agamas,agama'
        ]);

        $agama = Agama::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Agama berhasil dibuat',
            'data' => new AgamaResource($agama)
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $agama = Agama::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => new AgamaResource($agama)
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $agama = Agama::findOrFail($id);
        
        $validated = $request->validate([
            'agama' => 'required|string|unique:agamas,agama,' . $id
        ]);

        $agama->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Agama berhasil diupdate',
            'data' => new AgamaResource($agama)
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $agama = Agama::findOrFail($id);
        $agama->delete();

        return response()->json([
            'success' => true,
            'message' => 'Agama berhasil dihapus'
        ]);
    }
}