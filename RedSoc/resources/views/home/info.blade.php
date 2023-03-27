@extends('layouts.dashboard')

@section('title')
<title>Inicio</title>
@endsection

@section('link')
<link href="{{url('DashboardAssets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('page-title')
<h4 class="page-title">Estadísticas</h4>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Estadísticas</li>
@endsection

@section('content')

<div class="row">
    <div class="col-xl-4">
        <div class="card-box">
            <h4 class="header-title mb-3">Beneficiarios</h4>

            <div class="widget-chart text-center" dir="ltr">
                
                <div class="avatar-xxl rounded-circle bg-soft-pink border-pink border" style="display: inline-flex;">
                    <i class="mdi mdi-domain avatar-title text-pink" style="font-size: 50px;"></i>
                </div>
                <!--<input data-plugin="knob" data-width="120" data-height="120" data-linecap=round data-fgColor="#f1556c" value="{{$tbeneficiarios}}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".12"/>
                -->
                <h5 class="text-muted mt-3">Beneficiarios Totales</h5>
                <h2><span data-plugin="counterup">{{$tbeneficiarios}}</span></h2>

                <div class="row mt-3">
                    <div class="col-4">
                        <p class="text-muted font-15 mb-1 text-truncate">Últimos 30 Días</p>
                        <h4><span data-plugin="counterup">{{$tbeneficiariosl30days}}</span></h4>
                    </div>
                    <div class="col-4">
                        <p class="text-muted font-15 mb-1 text-truncate">Últimos 6 Meses</p>
                        <h4><span data-plugin="counterup">{{$tbeneficiariosl180days}}</span></h4>
                    </div>
                    <div class="col-4">
                        <p class="text-muted font-15 mb-1 text-truncate">Ultimos 12 Meses</p>
                        <h4><span data-plugin="counterup">{{$tbeneficiariosl365days}}</span></h4>
                    </div>
                </div> <!-- end row -->
                
            </div>
        </div> <!-- end card-box -->
    </div> <!-- end col-->

    <div class="col-xl-4">
        <div class="card-box">
            <h4 class="header-title mb-3">Vínculos</h4>

            <div class="widget-chart text-center" dir="ltr">
                <div class="avatar-xxl rounded-circle bg-soft-success border-success border" style="display: inline-flex;">
                    <i class="mdi mdi-transit-connection-variant avatar-title text-success" style="font-size: 50px;"></i>
                </div>
                <h5 class="text-muted mt-3">Vinculos Totales</h5>
                <h2><span data-plugin="counterup">{{$tvinculos}}</span></h2>

                <div class="row mt-3">
                    <div class="col-4">
                        <p class="text-muted font-15 mb-1 text-truncate">Ultimos 30 Días</p>
                        <h4><span data-plugin="counterup">{{$tvinculosl30days}}</span></h4>
                    </div>
                    <div class="col-4">
                        <p class="text-muted font-15 mb-1 text-truncate">Ultimos 6 Meses</p>
                        <h4><span data-plugin="counterup">{{$tvinculosl180days}}</span></h4>
                    </div>
                    <div class="col-4">
                        <p class="text-muted font-15 mb-1 text-truncate">Ultimo 12 Meses</p>
                        <h4><span data-plugin="counterup">{{$tvinculosl365days}}</span></h4>
                    </div>
                </div> <!-- end row -->
                
            </div>
        </div> <!-- end card-box -->
    </div> <!-- end col-->

    <div class="col-xl-4">
        <div class="card-box">
            <h4 class="header-title mb-3">Seguimientos</h4>

            <div class="widget-chart text-center" dir="ltr">
                <div class="avatar-xxl rounded-circle bg-soft-blue border-blue border" style="display: inline-flex;">
                    <i class="fe-search avatar-title text-blue" style="font-size: 50px;"></i>
                </div>
                <h5 class="text-muted mt-3">Seguimientos Totales</h5>
                <h2><span data-plugin="counterup"></span></h2>

                <div class="row mt-3">
                    <div class="col-4">
                        <p class="text-muted font-15 mb-1 text-truncate">Ultimos 30 Días</p>
                        <h4><span data-plugin="counterup"></span></h4>
                    </div>
                    <div class="col-4">
                        <p class="text-muted font-15 mb-1 text-truncate">Ultimos 6 Meses</p>
                        <h4><span data-plugin="counterup"></span></h4>
                    </div>
                    <div class="col-4">
                        <p class="text-muted font-15 mb-1 text-truncate">Ultimo 12 Meses</p>
                        <h4><span data-plugin="counterup"></span></h4>
                    </div>
                </div> <!-- end row -->
                
            </div>
        </div> <!-- end card-box -->
    </div> <!-- end col-->
</div>
<!-- end row -->
@endsection

@section('scripts')
<script src="{{url('DashboardAssets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
@endsection
