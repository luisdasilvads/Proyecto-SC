<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Carbon\Carbon;
use App\Models\Vinculo;
use App\Models\Beneficiario;
use App\Models\Seguimiento;
use App\Models\Seguimientos_h;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SeguimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seguimientos['seguimientos']=Seguimiento::all();
        //$beneficiario=Beneficiario::where('id',$datos->beneficiarios)->get();
        //$oferente=Beneficiario::where('id',$datos->oferente)->get();
        //return view('vinculo.index',$datos,$beneficiario,$oferente);
        $vinculos['vinculos']=Vinculo::all('descripcion','id');
        return view('seguimiento.index',$vinculos,$seguimientos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vinculos['vinculos']=Vinculo::all('descripcion','id');
        //$beneficiario=Beneficiario::where('id',$datos->beneficiarios)->get();
        //$oferente=Beneficiario::where('id',$datos->oferente)->get();
        return view('seguimiento.create',$vinculos);
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
            $creadoal = Carbon::now()->toDateTimeString();
            $data = Arr::add($data, 'created_at', $creadoal);
            Seguimiento::insert($data);
            Session::flash('message', 'Seguimiento creado exitosamente!');
            return redirect('seguimiento');
    
            } catch (Exception $ex) {
                Session::flash('error', 'Error al agregar Seguimiento');
                return view('layouts.dashboard');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $seguimiento['seguimiento']=Seguimiento::findOrFail($id);
            $vinculos['vinculos']=Vinculo::all('descripcion','id');
        return view('seguimiento.edit',$vinculos,$seguimiento);
        
        } catch ( Eception $ex) {
            Session::flash('error', 'Error al actualizar el Seguimiento');
            return view('layouts.dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // aqui se envia el formulario para actualizar
        try {
            $seguimiento_h1er=Seguimientos_h::where('id_segumiento', $id)->get();
            $data = $request->except(['_token','_method']) ;
            //VALIDA SI ES PRIMERA VEZ QUE ACTUALIZA Y AGREGA EL PRIMER REGISTRO PARA TENER EL HISTORICO COMPLETO
            if(count($seguimiento_h1er) == 0){
                $seguimientoOriginal=Seguimiento::where('id','=',$id)->get()->toArray();
                $seguimiento = array_shift($seguimientoOriginal);
                $seguimiento = Arr::add($seguimiento, 'id_segumiento', $id);
                unset($seguimiento['updated_at']);
                unset($seguimiento['id']);
                $seguimiento['created_at']=Carbon::parse($seguimiento['created_at'])->format('Y-m-d H:i:s');
                Seguimientos_h::insert($seguimiento);
            }
            Seguimiento::where('id','=',$id)->update($data);
            $creadoal1 = Carbon::now()->toDateTimeString();
            $data = Arr::add($data, 'created_at', $creadoal1);
            $data = Arr::add($data, 'id_segumiento', $id);
            Seguimientos_h::insert($data);
            Session::flash('message', 'Seguimiento Editado exitosamente!');
            return redirect('seguimiento');      
        } catch (Exception $ex) {
            Session::flash('error', 'Error al actualizar el Seguimiento');
            return view('layouts.dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function view_historico_seguimiento($id)
    {
        try {
            //$seguimiento_h=Seguimientos_h::all()->where('id_segumiento',$id);
            $seguimiento_h = Seguimientos_h::where('id_segumiento', $id)->orderBy('created_at', 'asc')->get();
            $vinculos['vinculos']=Vinculo::all('descripcion','id');
            //dd($seguimiento_h);
            //$beneficiarios=Beneficiario::all('nombre','id');
            return view('seguimiento.historico',compact('seguimiento_h'),$vinculos); 
        } catch (Exception $ex) {
            Session::flash('error', 'Error al eliminar el Vinculo');
            return view('vinculo');
        }
    }
}
