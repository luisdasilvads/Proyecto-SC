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
                <h4 class="header-title">Agregar Viínculo</h4>
                <form action="{{url('/beneficiario')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nombre" class="col-form-label">Nombre de la organizacion o institución</label>
                            <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Ej: RedSoc" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="tipo_org" class="col-form-label">Beneficiario</label>
                            <select name="tipo_org" id="tipo_org" class="form-control" required>
                                <option value>Elegir</option>
                                @foreach ($beneficiarios as $beneficiario)
                                    <option value="{{$beneficiario->nombre}}">{{$beneficiario->nombre}}</option>                     
                                @endforeach
                                <option value="ODS Afiliada"></option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="sector" class="col-form-label">Sector</label>
                                <select name="sector" id="sector" class="form-control" required>
                                    <option value>Elegir</option>
                                    <option value="Local">Local</option>
                                    <option value="Nacional">Nacional</option>
                                    <option value="Internacional">Internacional</option>
                                </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="nombre_cont" class="col-form-label">Nombre y Apellido Persona Contacto</label>
                            <input name="nombre_cont" type="text" class="form-control" id="nombre_cont" placeholder="Ej: Jhon Doe" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="email" class="col-form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Ej: jhondoe@gmail.com" required>
                        </div>
                        
                        <div class="form-group col-md-2">
                            <label for="telf_c_cont" class="col-form-label">Teléfono Oficina</label>
                            <input name="telf_c_cont" type="text" class="form-control" id="telf_c_cont" placeholder="0212-1234567" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="telf_l_cont" class="col-form-label">Fecha del Vínculo</label>
                            <!--<input name="telf_l_cont" type="text" class="form-control" id="telf_l_cont" placeholder="0414-1234567" required>-->
                            <input type="text" class="form-control flatpickr-input" placeholder="Seleccionar Fecha" readonly="readonly">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="telf_l_cont" class="col-form-label">Fecha del Vínculo boostrap</label>
                            <!--<input name="telf_l_cont" type="text" class="form-control" id="telf_l_cont" placeholder="0414-1234567" required>-->
                            <input type="text" class="form-control" data-provide="datepicker">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-block btn-info waves-effect waves-light">Agregar Vínculo</button>
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<script src="{{url('DashboardAssets/js/pages/form-pickers.init.js')}}"></script>
        <script src="{{url('DashboardAssets/libs/flatpickr/flatpickr.min.js')}}"></script>
<!-- end row -->    
@endsection

