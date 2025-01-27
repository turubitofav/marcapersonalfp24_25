<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserCompetencia;;
use App\Models\Competencia;
use App\Models\User;
use App\Http\Resources\CompetenciaResource;
use Illuminate\Http\Request;

class CompetenciaController extends Controller
{
    public function index(Request $request)
    {
        return CompetenciaResource::collection(
            Competencia::orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage)
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'nivel' => 'required',
        ]);

        return Competencia::create($data);
    }

    public function show(Competencia $competencia)
    {
        return new CompetenciaResource($competencia);
    }

    public function update(Request $request, Competencia $competencia)
    {
        $competencia = json_decode($request->getContent(), true);+
        $competencia->update($competencia);

        return new CompetenciaResource($competencia);
    }

    public function destroy(Competencia $competencia)
    {
        try {
            $competencia->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar la competencia'], 500);
        }
    }

}
