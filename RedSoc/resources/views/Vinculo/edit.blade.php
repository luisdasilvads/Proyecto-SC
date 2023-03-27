@extends('layouts.dashboard')

@section('title')
<title>Editar Vínculo</title>
@endsection

@section('page-title')
    <h4 class="page-title">Vínculos</h4>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{url('beneficiario')}}">Lista de Vínculos</a></li>
    <li class="breadcrumb-item active">Editar Vínculo</li>
@endsection

@section('content')
<!-- Form row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Editar Vínculo</h4>
                <form action="{{url('vinculo/'.$vinculo->id)}}" method="POST" enctype="multipart/form-data">
                <!--<form action="{url('beneficiario/'.$beneficiario->id)}}" method="POST" enctype="multipart/form-data">-->
                    @csrf
                    {{ method_field('PATCH')}}
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="beneficiarios" class="col-form-label">Beneficiario</label>
                            <select name="beneficiarios" id="beneficiarios" class="form-control" required>
                                @foreach ($beneficiarios as $beneficiario)
                                @if(($vinculo->beneficiarios) == ($beneficiario->id) )
                                <option value="{{$vinculo->beneficiarios}}">{{$beneficiario->nombre}}</option>
                                @endif
                                @endforeach
                                @foreach ($beneficiarios as $beneficiario)
                                <option value="{{$beneficiario->id}}">{{$beneficiario->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="oferente" class="col-form-label">Oferente</label>
                            <select name="oferente" id="oferente" class="form-control" required>
                                @foreach ($beneficiarios as $beneficiario)
                                @if(($vinculo->oferente) == ($beneficiario->id) )
                                <option value="{{$vinculo->oferente}}">{{$beneficiario->nombre}}</option>
                                @endif
                                @endforeach
                                @foreach ($beneficiarios as $beneficiario)
                                <option value="{{$beneficiario->id}}">{{$beneficiario->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="forma_comunacion" class="col-form-label">Forma Comunicación</label>
                            <select name="forma_comunacion" id="sector" class="form-control" required>
                                <option value="{{$vinculo->forma_comunacion}}">{{$vinculo->forma_comunacion}}</option>
                                <option value="Telefonica">Telefonica</option>
                                <option value="Correo">Correo</option>
                                <option value="WhatsApp">WhatsApp</option>
                                <option value="Otra">Otra</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="lugar" class="col-form-label">Lugar</label>
                            <input name="lugar" type="text" class="form-control" id="lugar"
                                placeholder="Ej: Caracas" required value="{{$vinculo->lugar}}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="nombre_apellido_contacto" class="col-form-label">Nombre y Apellido Persona Contacto</label>
                            <input name="nombre_apellido_contacto" type="text" class="form-control" id="nombre_apellido_contacto"
                                placeholder="Ej: Jhon Doe" required value="{{$vinculo->nombre_apellido_contacto}}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="fecha" class="col-form-label">Fecha Contacto</label>
                            <input name="fecha" type="date" class="form-control" id="fecha"
                                placeholder="" required value="{{$vinculo->fecha}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="descripcion" class="col-form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="5" placeholder="Descripcion del vínculo..." required>{{$vinculo->descripcion}}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-info waves-effect waves-light">Editar
                        Vínculo</button>
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

<!-- end row -->    
@endsection

