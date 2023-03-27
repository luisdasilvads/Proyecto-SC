@extends('layouts.dashboard')

@section('title')
<title>Crear Seguimiento</title>
@endsection

@section('page-title')
    <h4 class="page-title">Seguimientos</h4>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{url('beneficiario')}}">Lista de Seguimientos</a></li>
    <li class="breadcrumb-item active">Agregar Seguimientos</li>
@endsection

@section('content')

<!-- Form row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Agregar Seguimientos</h4>
                <form action="{{url('/seguimiento')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id_vinculo" class="col-form-label">Vinculo para hacer seguimiento</label>
                            <select name="id_vinculo" id="id_vinculo" class="form-control" required>
                                <option value>Elegir</option>
                                @foreach ($vinculos as $vinculo)
                                <option value="{{$vinculo->id}}">{{$vinculo->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="estatus" class="col-form-label">Estatus</label>
                                <select name="estatus" id="estatus" class="form-control" required>
                                    <option value>Elegir</option>
                                    <option value="Iniciado">Iniciado</option>
                                    <option value="En Proceso">En Proceso</option>
                                    <option value="Cancelado">Cancelado</option>
                                    <option value="Finalizado">Finalizado</option>
                                </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fecha" class="col-form-label">Fecha Recordatorio Seguimiento</label>
                            <input name="fecha" type="date" class="form-control" id="fecha"
                                placeholder="" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="avance" class="col-form-label">Avance hasta la fecha</label>
                            <textarea class="form-control" id="avance" name="avance" rows="5" placeholder="Se ha podido llevar a cabo..." required></textarea>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-block btn-info waves-effect waves-light">Agregar Seguimiento</button>
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

<!-- end row -->    
@endsection

