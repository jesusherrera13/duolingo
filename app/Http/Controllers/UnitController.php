<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\UnitCreateRequest;
use App\Http\Requests\UnitUpdateRequest;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::all();
        return view('units.index', compact('units'));
    }

    public function create(Request $request)
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitCreateRequest $request)
    {
        $validated = $request->validated();
        
        Unit::create($validated);

        return redirect('/units');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        return view('units.show', compact('unit'));
    }

    public function edit(Unit $unit)
    {
        return view('units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(UnitUpdateRequest $request, Unit $unit)
    {
        // dd($unit);
        $validated = $request->validated();

        $unit->update($validated);

        return redirect('/units');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
    }

    public function home()
    {
        $units = Unit::all();
        
        return view('home', compact('units'));
    }
}
