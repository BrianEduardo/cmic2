<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Noticias::query()
        ->with(['noticiaCategorias'])
        ->when($request->category_id, function(Builder $builder, $value){
            return $builder->whereRelation('noticiaCategorias', 'categories.id', '=', $value);
        })
        ->where('habilitado', true)
        ->latest()
        ->limit($request->limit)
        ->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
