@extends('layouts.dashboard')

@section('title')
<title>Vínculos</title>
@endsection

@section('page-title')
    <h4 class="page-title">Vínculos</h4>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Lista de Vínculos</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Lista De Vínculos</h4>
                <p class="text-muted font-13 mb-4">
                    A continuación se despliega una lista con todos los Vínculos agregados a la base de datos.
                </p>

                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                    <!-- <table id="scroll-vertical-datatable" class="table dt-responsive nowrap"> !-->
                    <!-- <table id="datatable-buttons" class="table table-striped dt-responsive nowrap"> !-->
                    
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Beneficiario</th>
                            <th>Oferente</th>
                            <th>Forma Comunicación</th>
                            <th>Lugar</th>
                            <th>Nombre y Apellido Contacto</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @foreach ($vinculos as $vinculo)
                        <tr>    
                            <td>{{$vinculo->id}}</td>
                            <td>{{$vinculo->fecha}}</td>
                            @foreach ($beneficiarios as $beneficiario)
                            @if(($vinculo->beneficiarios) == ($beneficiario->id) )
                            <td>{{ $beneficiario->nombre}}</td>
                            @endif
                            @endforeach
                            @foreach ($beneficiarios as $beneficiario)
                            @if(($vinculo->oferente) == ($beneficiario->id) )
                            <td>{{ $beneficiario->nombre}}</td>
                            @endif
                            @endforeach
                            <td>{{$vinculo->forma_comunacion}}</td>
                            <td>{{$vinculo->lugar}}</td>
                            <td>{{$vinculo->nombre_apellido_contacto}}</td>
                            <td>{{$vinculo->descripcion}} </td>
                            <td> 
                                <a href="{{ url('vinculo/'.$vinculo->id.'/edit') }}"><i class="mdi mdi-18px mdi-account-edit"></i></a>
                                <span style="color: white" >___</span>  
                                <a href="{{ url('vinculo/'.$vinculo->id.'/delete')}}"><i class=" mdi mdi-18px mdi-account-minus"></i></a>
                            </td>
                        </tr>    
                        @endforeach
                        @if(count($vinculos) == 0)
                        <tr>
                            <td>No hay beneficiarios registrados aún</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

@endsection