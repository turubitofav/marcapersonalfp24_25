<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CurriculoResource;
use App\Models\Curriculo;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class CurriculoController extends Controller
{
    public $modelclass = Curriculo::class;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return CurriculoResource::collection(
            Curriculo::orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $curriculo = json_decode($request->getContent(), true);
        $curriculo = Curriculo::create($curriculo);

        return new CurriculoResource($curriculo);
    }

    /**
     * Display the specified resource.
     */
    public function show(Curriculo $curriculo)
    {
        return new CurriculoResource($curriculo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curriculo $curriculo)
    {
<<<<<<< HEAD
        abort_if (! Gate::allows('update-curriculo', $curriculo), 403);
=======
        abort_if ($request->user()->cannot('update', $curriculo), 403);
>>>>>>> 00b4e0dd525e9738337751202847061c4c77d145

        $curriculoData = json_decode($request->getContent(), true);
        $curriculo->update($curriculoData);

        return new CurriculoResource($curriculo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curriculo $curriculo)
    {
        try {
            $curriculo->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
