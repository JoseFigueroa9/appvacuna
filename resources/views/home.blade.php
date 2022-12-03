@extends('layouts.theme.app')

@section('content')
<section class="section">
<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
        <h4 class="card-title">
        <b class="page__heading">Panel del Inicio</b>
        </h4>
    </div>
                <div class="col-lg-12">
                        <div class="card-body">
                        <div class="row">
                                <div class="col-md-4 col-xl-4">
                                <div class="card bg-c-blue order-card">
                                            <div class="card-block" style="background: #59D3CB">
                                            <h2 class="pt-2 text-light">&nbsp Colaboradores</h2>                                               
                                                @php
                                                 use App\Models\User;
                                                $cant_usuarios = User::count();                                                
                                                @endphp
                                                <h2 class="text-right text-light"><span>{{$cant_usuarios}} </span><i class="fa fa-user-md"></i>&nbsp</h2>
                                                <p class="m-b-0 text-right"><b><a href="/users" class="text-light">Ver más &nbsp</a></b></p>
                                            </div>                                            
                                        </div>                                    
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-green order-card">
                                            <div class="card-block" style="background: #81B0C1">
                                            <h2 class="pt-2 text-light">&nbsp Roles</h2>                                               
                                                @php
                                                use Spatie\Permission\Models\Role;
                                                 $cant_roles = Role::count();                                                
                                                @endphp
                                                <h2 class="text-right text-light"><span>{{$cant_roles}}</span> <i class="fa fa-user-lock f-left"></i>&nbsp</h2>
                                                <p class="m-b-0 text-right"><b><a href="/roles" class="text-light">Ver más &nbsp</a></b></p>
                                            </div>
                                        </div>
                                    </div>                                                                
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block" style="background: #5DADE2">
                                                <h2 class="pt-2 text-light">&nbsp Pacientes</h2>                                               
                                                @php
                                                 use App\Models\Patient;
                                                $cant_pacientes = Patient::count();                                                
                                                @endphp
                                                <h2 class="text-right text-light"><span>{{$cant_pacientes}} </span><i class="fa fa-user-plus"></i>&nbsp</h2>
                                                <p class="m-b-0 text-right"><b><a href="/patients" class="text-light">Ver más &nbsp</a></b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                        </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </section>
@endsection
