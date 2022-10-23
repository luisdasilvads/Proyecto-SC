@extends('layouts.dashboard')

@section('title')
<title>Beneficiarios</title>
@endsection

@section('page-title')
    <h4 class="page-title">Beneficiarios</h4>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Lista de Beneficiarios</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Lista De Beneficiarios</h4>
                <p class="text-muted font-13 mb-4">
                    A continuación se despliega una lista con todos los beneficiarios agregados a la base de datos.
                </p>

                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                    <!-- <table id="scroll-vertical-datatable" class="table dt-responsive nowrap"> !-->
                    <!-- <table id="datatable-buttons" class="table table-striped dt-responsive nowrap"> !-->
                    
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Organización</th>
                            <th>Tipo de Organización</th>
                            <th>Sector</th>
                            <th>Nombre Contacto</th>
                            <th>Telf. Oficina</th>
                            <th>Telf. Celular</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                
                
                    <tbody>
                        @foreach ($beneficiarios as $beneficiario)
                        <tr>
                            <td>{{$beneficiario->id }}</td>
                            <td>{{$beneficiario->nombre}}</td>
                            <td>{{$beneficiario->tipo_org}}</td>
                            <td>{{$beneficiario->sector}}</td>
                            <td>{{$beneficiario->nombre_cont}} </td>
                            <td>{{$beneficiario->telf_c_cont}}</td>
                            <td>{{$beneficiario->telf_l_cont}}</td>
                            <td>{{$beneficiario->email}}</td>
                            <td> 
                                <a href="{{ url('beneficiario/'.$beneficiario->id.'/edit') }}"><i class="mdi mdi-18px mdi-account-edit"></i></a>
                                <span style="color: white" >___</span>  
                                <a href="{{ url('beneficiario/'.$beneficiario->id.'/delete')}}"><i class=" mdi mdi-18px mdi-account-minus"></i></a>
                            </td>
                        </tr>    
                        @endforeach
                        @if(count($beneficiarios) == 0)
                        <tr>
                            <td>No hay beneficiarios registrados aún</td>
                            <td></td>
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