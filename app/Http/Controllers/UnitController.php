<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Http\Resources\UnitResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UnitController extends Controller
{
    public function index(): JsonResponse
    {
        $units = Unit::all();
        return response()->json([
            'success' => true,
            'data' => UnitResource::collection($units)
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'unit' => 'required|string|unique:units,unit'
        ]);

        $unit = Unit::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Unit berhasil dibuat',
            'data' => new UnitResource($unit)
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $unit = Unit::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => new UnitResource($unit)
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $unit = Unit::findOrFail($id);
        
        $validated = $request->validate([
            'unit' => 'required|string|unique:units,unit,' . $id
        ]);

        $unit->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Unit berhasil diupdate',
            'data' => new UnitResource($unit)
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        return response()->json([
            'success' => true,
            'message' => 'Unit berhasil dihapus'
        ]);
    }
}