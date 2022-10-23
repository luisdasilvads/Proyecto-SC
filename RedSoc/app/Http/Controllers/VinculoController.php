<?php

namespace App\Http\Controllers;

use App\Models\Vinculo;
use App\Models\Beneficiario;
use Illuminate\Http\Request;

class VinculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $datos['vinculos']=Vinculo::paginate(100);
        $beneficiario=Beneficiario::where('id',$datos->beneficiarios)->get();
        $oferente=Beneficiario::where('id',$datos->oferente)->get();
        return view('vinculo.index',$datos,$beneficiario,$oferente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beneficiarios['beneficiarios']=Beneficiario::all('nombre');
        return view('vinculo.create',$beneficiarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vinculo  $vinculo
     * @return \Illuminate\Http\Response
     */
    public function show(Vinculo $vinculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vinculo  $vinculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Vinculo $vinculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vinculo  $vinculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vinculo $vinculo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vinculo  $vinculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vinculo $vinculo)
    {
        //
    }
}
