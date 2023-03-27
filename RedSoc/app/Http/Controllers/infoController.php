<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Vinculo;
use App\Models\Beneficiario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class infoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$vinculos['vinculos']=Vinculo::paginate(100);
        //$from30days = Carbon::now()->subMonths(1)->toDateString();
        //$articles = Beneficiario::where("created_at",">", Carbon::now()->subMonths(1))->count();
        //$last30tvinculos = Vinculo::whereDateBetween('created_at',(new Carbon)->subDays(30)->startOfDay()->toDateString(),(new Carbon)->now()->endOfDay()->toDateString())->get();
        //$last30tbeneficiarios = Beneficiario::whereDateBetween('created_at',(new Carbon)->subDays(30)->startOfDay()->toDateString(),(new Carbon)->now()->endOfDay()->toDateString() )->get();
        $from30days = (new Carbon)->subDays(30)->startOfDay()->toDateString();
        $from180days = (new Carbon)->subDays(180)->startOfDay()->toDateString();
        $from365days = (new Carbon)->subDays(365)->startOfDay()->toDateString();
        $toNow = (new Carbon)->now()->endOfDay()->toDateString();
        //vinculos
        $tvinculos = Vinculo::count();
        $tvinculosl30days = Vinculo::whereBetween('created_at', [$from30days, $toNow])->count();
        $tvinculosl180days = Vinculo::whereBetween('created_at', [$from180days, $toNow])->count();
        $tvinculosl365days = Vinculo::whereBetween('created_at', [$from365days, $toNow])->count();
        //Beneficiarios
        $tbeneficiarios = Beneficiario::count();
        $tbeneficiariosl30days = Beneficiario::whereBetween('created_at', [$from30days, $toNow])->count();
        $tbeneficiariosl180days = Beneficiario::whereBetween('created_at', [$from180days, $toNow])->count();
        $tbeneficiariosl365days = Beneficiario::whereBetween('created_at', [$from365days, $toNow])->count();

        
        return view('home.info',compact('tvinculos','tvinculosl30days','tvinculosl180days','tvinculosl365days','tbeneficiarios','tbeneficiariosl30days','tbeneficiariosl180days','tbeneficiariosl365days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //
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
}
