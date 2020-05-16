<?php

namespace App\Http\Controllers;

use App\Crime;
use App\Suspeito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JsonIncrementalParser;

class CrimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crime = Crime::all();
        $suspeito = Suspeito::all();
        foreach ($suspeito as $suspeito);
        return view('crime/lista_crime', compact('crime', 'suspeito'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $suspeito = Suspeito::all();
        $crime = new Crime();
        $crime->id_suspeito     = $request->input('id');
        $crime->suspeito        = $request->input('susp');
        $crime->comparsa        = $request->input('comparsa');
        $crime->crime           = $request->input('crime');
        $crime->data            = $request->input('data');
        $crime->conduzido_por   = $request->input("condutor");
        $crime->save();


        foreach ($suspeito as $sus)
            if ($sus->id == $crime->id_suspeito) {
                DB::table('suspeitos')->where('id', $crime->id_suspeito)->update([
                    'quantidadeCrime' => $sus->quantidadeCrime + 1
                ]);
                return redirect()->route('suspeitos.index', compact('crime'));
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function show(Suspeito $crime)
    {
        return view('crime/tela_crime', compact('crime'));
    }


    public function registrar($id)
    {
        $crimes = Crime::all();
        foreach ($crimes as $crime) {
            if ($crime->id_suspeito == $id) {
                return view('crime/registrarCrime', compact('crime', 'id'));
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function edit(Crime $crime)
    {
        return view('crime/editarCrime', compact('crime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crime $crime)
    {
        $crime->comparsa        = $request->input('comparsa');
        $crime->crime           = $request->input('crime');
        $crime->data            = $request->input('data');
        $crime->conduzido_por   = $request->input("condutor");
        $crime->save();
        return redirect()->route('suspeitos.index', compact('crime'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crime $crime)
    {
        $crime->delete();
        return redirect()->route('suspeitos.index', compact('crime'));
    }
}
