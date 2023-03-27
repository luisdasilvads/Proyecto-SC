@extends('layouts.dashboard')

@section('title')
<title>Crear Vínculo</title>
@endsection

@section('page-title')
<h4 class="page-title">Vínculos</h4>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('beneficiario')}}">Lista de Vínculos</a></li>
<li class="breadcrumb-item active">Agregar Vínculo</li>
@endsection

@section('content')

<!-- Form row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Agregar Vínculo</h4>
                <form action="{{url('/vinculo')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <!--<div class="form-group col-md-4">
                            <label for="nombre" class="col-form-label">Nombre de la organizacion o institución</label>
                            <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Ej: RedSoc" required>
                        </div>-->
                        <div class="form-group col-md-2">
                            <label for="beneficiarios" class="col-form-label">Beneficiario</label>
                            <select name="beneficiarios" id="beneficiarios" class="form-control" required>
                                <option value>Elegir</option>
                                @foreach ($beneficiarios as $beneficiario)
                                <option value="{{$beneficiario->id}}">{{$beneficiario->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="oferente" class="col-form-label">Oferente</label>
                            <select name="oferente" id="oferente" class="form-control" required>
                                <option value>Elegir</option>
                                @foreach ($oferentes as $oferente)
                                <option value="{{$oferente->id}}">{{$oferente->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="forma_comunacion" class="col-form-label">Forma Comunicación</label>
                            <select name="forma_comunacion" id="sector" class="form-control" required>
                                <option value>Elegir</option>
                                <option value="Telefonica">Telefonica</option>
                                <option value="Correo">Correo</option>
                                <option value="WhatsApp">WhatsApp</option>
                                <option value="Otra">Otra</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="lugar" class="col-form-label">Lugar</label>
                            <input name="lugar" type="text" class="form-control" id="nombre_ape_contacto"
                                placeholder="Ej: Caracas" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="nombre_apellido_contacto" class="col-form-label">Nombre y Apellido Persona Contacto</label>
                            <input name="nombre_apellido_contacto" type="text" class="form-control" id="nombre_ape_contacto"
                                placeholder="Ej: Jhon Doe" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="fecha" class="col-form-label">Fecha Contacto</label>
                            <input name="fecha" type="date" class="form-control" id="fecha"
                                placeholder="" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="descripcion" class="col-form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="5" placeholder="Descripcion del vínculo..." required></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block btn-info waves-effect waves-light">Agregar
                        Vínculo</button>
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<script src="{{url('DashboardAssets/js/pages/form-pickers.init.js')}}"></script>
<script src="{{url('DashboardAssets/libs/flatpickr/flatpickr.min.js')}}"></script>
<!-- end row -->
@endsection
