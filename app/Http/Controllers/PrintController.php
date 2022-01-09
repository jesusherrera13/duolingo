<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Requests\PracticeCreateRequest;
use App\Http\Requests\PracticeUpdateRequest;
use PDF;

class PrintController extends Controller
{
  public function createPDF(Request $request) {
      
    // dd($request);
    $phrase = $request['phrase'];
    $hanzi = $request['hanzi'];
    $pinyin = $request['pinyin'];

    if($request['module'] == "skills") $data = Practice::where("skill_id", $request['id'])->get();

    // view()->share('practices.show', compact('practice'));
    
    $pdf = PDF::loadView('print.pdf', compact('data', 'phrase', 'hanzi', 'pinyin'));

    // return $pdf->download('pdf_file.pdf');
    return $pdf->stream('pdf_file.pdf');
    // return $dompdf->stream('estadisticas_'.$request['order_by'].'.pdf');
  }

  public function printable(Request $request) {
    // dd($request);
    $title = null;
    $phrase = $request['phrase'];
    $hanzi = $request['hanzi'];
    $pinyin = $request['pinyin'];

    // dd($pinyin);

    if($request['module'] == "skills") {

      $data = Skill::find($request['id']);

      // dd($data->practices);
    }
    else if($request['module'] == "practices") {

      $data = Practice::find($request['id']);

      dd($data);
    }
    return view('print.printable', compact('data', 'phrase', 'hanzi', 'pinyin', 'title'));
  }
}
