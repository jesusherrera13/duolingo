<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Requests\PracticeCreateRequest;
use App\Http\Requests\PracticeUpdateRequest;
use PDF;

class PracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create(Skill $skill)
    {
        return view('practices.create', compact('skill'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PracticeCreateRequest $request)
    {
        // dd($request);
        $validated = $request->validated();
        Practice::create($validated);

        return redirect('/skill/'.$request['skill_id']);
    }

    public function edit(Practice $practice) {

        return view('practices.edit', compact('practice'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function show(Practice $practice)
    {
        return view('practices.show', compact('practice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function update(PracticeUpdateRequest $request, Practice $practice)
    {
        $validated = $request->validated();
        $practice->update($validated);

        return redirect('/skill/'.$practice->skill->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Practice $practice)
    {
        //
    }

    public function createPDF(Request $request, Practice $practice) {
        
        // dd($request);
        $phrase = $request['phrase'];
        $hanzi = $request['hanzi'];
        $pinyin = $request['pinyin'];

        // view()->share('practices.show', compact('practice'));
        
        $pdf = PDF::loadView('practices.pdf', compact('practice', 'phrase', 'hanzi', 'pinyin'));
  
        // return $pdf->download('pdf_file.pdf');
        return $pdf->stream('pdf_file.pdf');
        // return $dompdf->stream('estadisticas_'.$request['order_by'].'.pdf');
      }
}
