@extends('layouts.dashboard')

@section('title')
<title>Seguimientos</title>
@endsection

@section('page-title')
    <h4 class="page-title">Seguimientos</h4>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Lista de Seguimientos</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Lista De Seguimientos</h4>
                <p class="text-muted font-13 mb-4">
                    A continuación se despliega una lista con todos los Seguimientos agregados a la base de datos.
                </p>

                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                    <!-- <table id="scroll-vertical-datatable" class="table dt-responsive nowrap"> !-->
                    <!-- <table id="datatable-buttons" class="table table-striped dt-responsive nowrap"> !-->
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripcion del Vinculo</th>
                            <th>Estatus</th>
                            <th>Avance</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                
                
                    <tbody>
                        @foreach ($seguimientos as $seguimiento)
                        <tr>
                            <td>{{$seguimiento->id }}</td>
                            @foreach ($vinculos as $vinculo)
                            @if(($seguimiento->id_vinculo) == ($vinculo->id) )
                            <td>{{ $vinculo->descripcion}}</td>
                            @endif
                            @endforeach
                            @if(($seguimiento->estatus) == "Iniciado" )
                            <td><span class="badge badge-info">{{$seguimiento->estatus}}</span></td>
                            @elseif (($seguimiento->estatus) == "En Proceso") 
                            <td><span class="badge badge-warning">{{$seguimiento->estatus}}</span></td>
                            @elseif (($seguimiento->estatus) == "Cancelado") 
                            <td><span class="badge badge-danger">{{$seguimiento->estatus}}</span></td>
                            @else (($seguimiento->estatus) == "Finalizado") 
                            <td><span class="badge badge-success">{{$seguimiento->estatus}}</span></td>
                            @endif
                            <td>{{$seguimiento->avance}}</td>
                            <td>{{$seguimiento->fecha}} </td>
                            <td> 
                                <a href="{{ url('seguimiento/'.$seguimiento->id.'/edit') }}"><i class="mdi mdi-18px mdi-account-edit"></i></a>
                                <span style="color: white" >___</span>  
                                <a href="{{ url('seguimiento/'.$seguimiento->id.'/delete')}}"><i class=" mdi mdi-18px mdi-account-minus"></i></a>
                                <span style="color: white" >___</span>  
                                <a href="{{ url('seguimiento/'.$seguimiento->id.'/historico')}}"><i class=" mdi mdi-18px mdi mdi-history"></i></a>
                            </td>
                        </tr>    
                        @endforeach
                        @if(count($seguimientos) == 0)
                        <tr>
                            <td>No hay Seguimientos registrados aún</td>
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