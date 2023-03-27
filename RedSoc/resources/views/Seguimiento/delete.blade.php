@extends('layouts.dashboard')

@section('title')
<title>Eliminar Seguimiento</title>
@endsection

@section('page-title')
    <h4 class="page-title">Seguimientos</h4>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{url('beneficiario')}}">Lista de Seguimientos</a></li>
    <li class="breadcrumb-item active">Eliminar Seguimientos</li>
@endsection

@section('content')
<!-- Form row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Eliminar Beneficiarios</h4>
                <form action="{{url('beneficiario/'.$beneficiario->id)}}" method="POST" enctype="multipart/form-data">
                <!--<form action="{url('beneficiario/'.$beneficiario->id)}}" method="POST" enctype="multipart/form-data">-->
                    @csrf
                    {{method_field('DELETE')}}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nombre" class="col-form-label">Nombre de la organizacion o institución</label>
                            <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Ej: RedSoc" required value="{{$beneficiario->nombre}}" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="tipo_org" class="col-form-label">Tipo de Organismo</label>
                            <select name="tipo_org" id="tipo_org" class="form-control" disabled>
                                <option value="{{$beneficiario->tipo_org}}">{{$beneficiario->tipo_org}}</option>
                                <option value="ODS Afiliada">ODS Afiliada</option>
                                <option value="ODS No Afiliada">ODS No Afiliada</option>
                                <option value="Empresa">Empresa</option>
                                <option value="Gobierno">Gobierno</option> 
                                <option value="Academia">Academia</option>
                                <option value="Cooperante">Cooperante</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="sector" class="col-form-label">Sector</label>
                                <select name="sector" id="sector" class="form-control" disabled>
                                    <option value="{{$beneficiario->sector}}">{{$beneficiario->sector}}</option>
                                    <option value="Local">Local</option>
                                    <option value="Nacional">Nacional</option>
                                    <option value="Internacional">Internacional</option>
                                </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="nombre_cont" class="col-form-label">Nombre y Apellido Persona Contacto</label>
                            <input name="nombre_cont" type="text" class="form-control" id="nombre_cont" placeholder="Ej: Jhon Doe" value="{{$beneficiario->nombre_cont}}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="email" class="col-form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Ej: jhondoe@gmail.com" value="{{$beneficiario->email}}" disabled>
                        </div>
                        
                        <div class="form-group col-md-2">
                            <label for="telf_c_cont" class="col-form-label">Teléfono Oficina</label>
                            <input name="telf_c_cont" type="text" class="form-control" id="telf_c_cont" placeholder="0212-1234567" value="{{$beneficiario->telf_c_cont}}" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="telf_l_cont" class="col-form-label">Teléfono Celular</label>
                            <input name="telf_l_cont" type="text" class="form-control" id="telf_l_cont" placeholder="0414-1234567" value="{{$beneficiario->telf_l_cont}}" disabled>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-block btn-info waves-effect waves-light">Eliminar Beneficiario</button>
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

<!-- end row -->    
@endsection

