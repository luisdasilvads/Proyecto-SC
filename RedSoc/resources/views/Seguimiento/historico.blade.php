@extends('layouts.dashboard')

@section('title')
<title>Histórico del Seguimiento</title>
@endsection

@section('page-title')
    <h4 class="page-title">Histórico del Seguimiento</h4>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{url('beneficiario')}}">Lista de Seguimientos</a></li>
    <li class="breadcrumb-item active">Histórico del Seguimiento</li>
@endsection

@section('content')
<!-- Form row -->
<div class="row">
    @php
        $contador = 0;
    @endphp
    @foreach ($seguimiento_h as $seguimiento)
    <div class="col-12">
        <div class="card">
            <div class="card-box ribbon-box">
                @php
                    $contador++; // Incrementar el contador
                    //echo "<h4 class='header-title'>Cambio $contador</h4>"
                    echo "<div class='ribbon ribbon-info float-left'><i class='mdi mdi-access-point mr-1'></i> Cambio Nº $contador</div>"
                @endphp
                <h5 class="text-info float-right mt-0">Fecha de actualizacion: {{$seguimiento->created_at}} </h5>
                <!-- <div class="ribbon ribbon-info float-left"><i class="mdi mdi-access-point mr-1"></i> Info</div>-->
                <!--<form action="{url('beneficiario/'.$beneficiario->id)}}" method="POST" enctype="multipart/form-data">-->
                <div class="ribbon-content">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id_vinculo" class="col-form-label">Vínculo para hacer seguimiento</label>
                            <select name="id_vinculo" id="id_vinculo" class="form-control" disabled>                                
                                @foreach ($vinculos as $vinculo)
                                @if(($vinculo->id) == ($seguimiento->id_vinculo) )
                                <option value="{{$vinculo->id}}">{{$vinculo->descripcion}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="estatus" class="col-form-label">Estatus</label>
                                <select name="estatus" id="estatus" class="form-control" disabled>
                                    <option value="{{$seguimiento->estatus}}">{{$seguimiento->estatus}}</option>
                                    <option value="Iniciado">Iniciado</option>
                                    <option value="En Proceso">En Proceso</option>
                                    <option value="Cancelado">Cancelado</option>
                                    <option value="Finalizado">Finalizado</option>
                                    <option value="Otro">Otro</option>
                                </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fecha" class="col-form-label">Fecha Recordatorio Seguimiento</label>
                            <input name="fecha" type="date" class="form-control" id="fecha"
                                placeholder="" value="{{$seguimiento->fecha}}" disabled>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="avance" class="col-form-label">Avance hasta la fecha</label>
                            <textarea class="form-control" id="avance" name="avance" rows="5" placeholder="Se ha podido llevar a cabo..." disabled>{{$seguimiento->avance}}</textarea>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
    @endforeach

    @if(count($seguimiento_h) == 0)
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Aun no hay cambios en el seguimiento</h4>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
    @endif
</div>

<!-- end row -->    
@endsection

