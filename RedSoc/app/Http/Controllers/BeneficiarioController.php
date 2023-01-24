<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Carbon\Carbon;
use App\Models\Beneficiario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;


class BeneficiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['beneficiarios']=Beneficiario::paginate(100);
        return view('Beneficiario.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Beneficiario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
        $data = $request->except('_token') ;
        $creadoal = Carbon::now()->toDateString();
        $data = Arr::add($data, 'created_at', $creadoal);
        Beneficiario::insert($data);
        Session::flash('message', 'Beneficiario creado exitosamente!');
        return redirect('beneficiario');

        } catch (Exception $ex) {
            Session::flash('error', 'Error al agregar Beneficiario');
            return view('layouts.dashboard');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beneficiario  $beneficiario
     * @return \Illuminate\Http\Response
     */
    public function show(Beneficiario $beneficiario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beneficiario  $beneficiario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $beneficiario=Beneficiario::findOrFail($id);
        return view('beneficiario.edit',compact('beneficiario'));
        
        } catch ( Eception $ex) {
            Session::flash('error', 'Error al actualizar el beneficiario');
            return view('layouts.dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beneficiario  $beneficiario
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        // aqui se envia el formulario para actualizar
        try {
            $data = $request->except(['_token','_method']) ;
            Beneficiario::where('id','=',$id)->update($data);
            Session::flash('message', 'Beneficiario Editado exitosamente!');
            return redirect('beneficiario');      
        } catch (Exception $ex) {
            Session::flash('error', 'Error al actualizar el beneficiario');
            return view('layouts.dashboard');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beneficiario  $beneficiario
     * @return \Illuminate\Http\Response
     */
    
    public function view_delete_beneficiario($id)
    {
        try {
            $beneficiario=Beneficiario::findOrFail($id);
            return view('beneficiario.delete',compact('beneficiario')); 
        } catch (Exception $ex) {
            Session::flash('error', 'Error al eliminar el beneficiario');
            return view('beneficiario');
        }
    }

     
    public function destroy(Request $request, $id)
    {
       try {
            $data = $request->except(['_token','_method']) ;
            $beneficiario=Beneficiario::findOrFail($id);
            Beneficiario::where('id','=',$id)->delete($data);
            Session::flash('message', 'Beneficiario eliminado exitosamente!');
            return redirect('beneficiario');     
        } catch (Exception $ex) {
            Session::flash('error', 'Error al eliminar el beneficiario');
            return view('beneficiario');
       }
    }
}
