@extends('layouts.dashboard')

@section('title')
<title>Inicio</title>
@endsection

@section('link')
<link href="{{url('DashboardAssets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('page-title')
<h4 class="page-title">Estadistícas</h4>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Estadistícas</li>
@endsection

@section('content')

<div class="row">
    <div class="col-xl-4">
        <div class="card-box">
            <h4 class="header-title mb-3">Beneficiarios</h4>

            <div class="widget-chart text-center" dir="ltr">
                <input data-plugin="knob" data-width="120" data-height="120" data-linecap=round data-fgColor="#f1556c" value="{{$tbeneficiarios}}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".12"/>
                <h5 class="text-muted mt-3">Beneficiarios Totales</h5>
                <h2>{{$tbeneficiarios}}</h2>

                <div class="row mt-3">
                    <div class="col-4">
                        <p class="text-muted font-15 mb-1 text-truncate">Último Mes</p>
                        <h4>$12k</h4>
                    </div>
                    <div class="col-4">
                        <p class="text-muted font-15 mb-1 text-truncate">Últimos 6 Meses</p>
                        <h4>$2487</h4>
                    </div>
                    <div class="col-4">
                        <p class="text-muted font-15 mb-1 text-truncate">Ultimos 12 Meses</p>
                        <h4>$14.5k</h4>
                    </div>
                </div> <!-- end row -->
                
            </div>
        </div> <!-- end card-box -->
    </div> <!-- end col-->

    <div class="col-xl-4">
        <div class="card-box">
            <h4 class="header-title mb-3">Vínculos</h4>

            <div class="widget-chart text-center" dir="ltr">
                <input data-plugin="knob" data-width="120" data-height="120" data-linecap=round data-fgColor="#6658dd" value="{{$tvinculos}}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".12"/>
                <h5 class="text-muted mt-3">Total sales made today</h5>
                <h2>{{$tvinculos}}</h2>

                <div class="row mt-3">
                    <div class="col-4">
                        <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                        <h4>480</h4>
                    </div>
                    <div class="col-4">
                        <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                        <h4>136</h4>
                    </div>
                    <div class="col-4">
                        <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
                        <h4>514</h4>
                    </div>
                </div> <!-- end row -->
                
            </div>
        </div> <!-- end card-box -->
    </div> <!-- end col-->

    <div class="col-xl-4">
        <div class="card-box">
            <h4 class="header-title mb-3">Seguimientos</h4>

            <div class="widget-chart text-center" dir="ltr">
                <input data-plugin="knob" data-width="120" data-height="120" data-linecap=round data-fgColor="#1abc9c" value="81" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".12"/>
                <h5 class="text-muted mt-3">Total sales made today</h5>
                <h2>72</h2>

                <div class="row mt-3">
                    <div class="col-4">
                        <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                        <h4>8k</h4>
                    </div>
                    <div class="col-4">
                        <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                        <h4>2.5k</h4>
                    </div>
                    <div class="col-4">
                        <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
                        <h4>10.2k</h4>
                    </div>
                </div> <!-- end row -->
                
            </div>
        </div> <!-- end card-box -->
    </div> <!-- end col-->
</div>
<!-- end row -->

<div>
    <a href="">{{$tvinculos}}</a>
    <a href="">{{$tbeneficiarios}}</a>
</div>
@endsection

@section('scripts')
<script src="{{url('DashboardAssets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
@endsection
