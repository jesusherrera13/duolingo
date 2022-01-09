<?php

namespace App\Http\Controllers;

use App\Models\Vocabulary;
use Illuminate\Http\Request;
use App\Http\Requests\VocabularyCreateRequest;
use App\Http\Requests\VocabularyUpdateRequest;

class VocabularyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vocabulary = Vocabulary::where('language_id', $request->session()->get('language_id'))->get();
        
        return view('vocabulary.index', compact('vocabulary'));
    }

    public function create()
    {
        return view('vocabulary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VocabularyCreateRequest $request)
    {
        $validated = $request->validated();

        Vocabulary::create($validated);

        return redirect('vocabulary');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vocabulary  $vocabulary
     * @return \Illuminate\Http\Response
     */
    public function show(Vocabulary $vocabulary)
    {
        //
    }

    public function edit(Vocabulary $vocabulary)
    {
        return view('vocabulary.edit', compact('vocabulary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vocabulary  $vocabulary
     * @return \Illuminate\Http\Response
     */
    public function update(VocabularyUpdateRequest $request, Vocabulary $vocabulary)
    {
        $validated = $request->validated();

        $vocabulary->update($validated);

        return redirect('vocabulary');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vocabulary  $vocabulary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vocabulary $vocabulary)
    {
        //
    }
}
