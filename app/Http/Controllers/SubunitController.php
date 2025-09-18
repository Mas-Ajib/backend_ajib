<?php

namespace App\Http\Controllers;

use App\Models\Subunit;
use App\Http\Resources\SubunitResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SubunitController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $unitId = $request->query('unit_id');
        
        $subunits = Subunit::with('unit')
            ->filterByUnit($unitId)
            ->get();

        return response()->json([
            'success' => true,
            'data' => SubunitResource::collection($subunits),
            'filters' => [
                'unit_id' => $unitId
            ]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'unit_id' => 'required|exists:units,id',
            'subunit' => 'required|string|unique:subunits,subunit'
        ]);

        $subunit = Subunit::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Subunit berhasil dibuat',
            'data' => new SubunitResource($subunit->load('unit'))
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $subunit = Subunit::with('unit')->findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => new SubunitResource($subunit)
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $subunit = Subunit::findOrFail($id);
        
        $validated = $request->validate([
            'unit_id' => 'required|exists:units,id',
            'subunit' => 'required|string|unique:subunits,subunit,' . $id
        ]);

        $subunit->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Subunit berhasil diupdate',
            'data' => new SubunitResource($subunit->load('unit'))
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $subunit = Subunit::findOrFail($id);
        $subunit->delete();

        return response()->json([
            'success' => true,
            'message' => 'Subunit berhasil dihapus'
        ]);
    }
}