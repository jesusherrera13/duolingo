<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\SkillCreateRequest;
use App\Http\Requests\SkillUpdateRequest;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $skills = Unit::all();
        return view('skills.index', compact('skills'));
    }

    public function create(Request $request, Unit $unit)
    {
        return view('skills.create', compact('unit'));
    }

    public function edit(Skill $skill)
    {
        return view('skills.edit', compact('skill'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillCreateRequest $request)
    {
        $validated = $request->validated();
        
        Skill::create($validated);

        return redirect('/unit/'.$request['unit_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        $title = $skill->unit->name.", ".$skill->name;

        return view('skills.show', compact('skill','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(SkillUpdateRequest $request, Skill $skill)
    {
        $validated = $request->validated();
        $skill->update($validated);

        return redirect('/units/'.$skill->unit->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        //
    }

    public function printable(Skill $skill)
    {
        return view('skills.printable', compact('skill'));
    }
}
