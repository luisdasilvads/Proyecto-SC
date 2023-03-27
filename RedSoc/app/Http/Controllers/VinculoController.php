<?php

namespace App\Http\Controllers;


use Illuminate\Support\Arr;
use Carbon\Carbon;
use App\Models\Vinculo;
use App\Models\Beneficiario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VinculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$vinculos['vinculos']=Vinculo::paginate(100);
        $vinculos['vinculos']=Vinculo::all();
        //$beneficiario=Beneficiario::where('id',$datos->beneficiarios)->get();
        //$oferente=Beneficiario::where('id',$datos->oferente)->get();
        //return view('vinculo.index',$datos,$beneficiario,$oferente);
        $beneficiarios['beneficiarios']=Beneficiario::all('nombre','id');
        return view('vinculo.index',$vinculos,$beneficiarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beneficiarios['beneficiarios']=Beneficiario::all('nombre','id');
        $oferentes['oferentes']=Beneficiario::all('nombre','id');
        //$beneficiario=Beneficiario::where('id',$datos->beneficiarios)->get();
        //$oferente=Beneficiario::where('id',$datos->oferente)->get();
        return view('vinculo.create',$beneficiarios,$oferentes);
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
        try {
            $data = $request->except('_token') ;
            $creadoal = Carbon::now()->toDateString();
            $data = Arr::add($data, 'created_at', $creadoal);
            Vinculo::insert($data);
            Session::flash('message', 'Vínculo creado exitosamente!');
            return redirect('vinculo');
    
            } catch (Exception $ex) {
                Session::flash('error', 'Error al agregar Vínculo');
                return view('layouts.dashboard');
            }
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
    public function edit($id)
    {
        try {
            $vinculo=Vinculo::findOrFail($id);
            $beneficiarios['beneficiarios']=Beneficiario::all('nombre','id');
        return view('vinculo.edit',compact('vinculo'),$beneficiarios);
        
        } catch ( Eception $ex) {
            Session::flash('error', 'Error al actualizar el vínculo');
            return view('layouts.dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vinculo  $vinculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // aqui se envia el formulario para actualizar
        try {
            $data = $request->except(['_token','_method']) ;
            Vinculo::where('id','=',$id)->update($data);
            Session::flash('message', 'Vínculo Editado exitosamente!');
            return redirect('vinculo');      
        } catch (Exception $ex) {
            Session::flash('error', 'Error al actualizar el Víinculo');
            return view('layouts.dashboard');
        }

    }


    public function view_delete_vinculo($id)
    {
        try {
            $vinculo=Vinculo::findOrFail($id);
            $beneficiarios=Beneficiario::all('nombre','id');
            return view('vinculo.delete',compact('beneficiarios','vinculo')); 
        } catch (Exception $ex) {
            Session::flash('error', 'Error al eliminar el Vinculo');
            return view('vinculo');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vinculo  $vinculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
       try {
            $data = $request->except(['_token','_method']) ;
            $vinculo=Vinculo::findOrFail($id);
            Vinculo::where('id','=',$id)->delete($data);
            Session::flash('message', 'Vínculo eliminado exitosamente!');
            return redirect('vinculo');     
        } catch (Exception $ex) {
            Session::flash('error', 'Error al eliminar el Vínculo');
            return view('vinculo');
       }
    }
}
