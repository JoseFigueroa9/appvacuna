<head>
<link href="{{ public_path('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
</head>
                        <img src="assets/img/logo_med.jpg" width="30" height="30" class="navbar-logo" alt="logo">
                        <b style="font-size: 19px; color: #3b3f5c">SisVacuna</b>
<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
            </div>
            <h2 class="text-center" style="font-size: 21px; color: #3b3f5c">Pacientes</h2>
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered striped mt-1">
                        <thead class="text-white" style="background: #3b3f5c">
                            <tr>
                                <th class="table-th text-white text-center">ID</th>
                                <th class="table-th text-white text-center">Nombres</th>
                                <th class="table-th text-white text-center">Apellidos</th>
                                <th class="table-th text-white text-center">DNI</th>
                                <th class="table-th text-white text-center">Teléfono</th>
                                <th class="table-th text-white text-center">E-mail</th>
                                <th class="table-th text-white text-center">Fecha Nacimiento</th>
                                <th class="table-th text-white text-center">Sexo</th>
                                <th class="table-th text-white text-center">Nombre Padre</th>
                                <th class="table-th text-white text-center">DNI Padre</th>
                                <th class="table-th text-white text-center">Nombre Madre</th>
                                <th class="table-th text-white text-center">DNI Madre</th>
                                <th class="table-th text-white text-center">Genero</th>
                                <th class="table-th text-white text-center">Fecha creación</th>
                                <th class="table-th text-white text-center">Fecha de actualización</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $patient)
                            <tr>
                                    <td><h6 class="text-center">{{$patient->name}}</h6></td>
                                    <td><h6 class="text-center">{{$patient->lastname}}</h6></td>
                                    <td><h6 class="text-center">{{$patient->dni}}</h6></td>
                                    <td><h6 class="text-center">{{$patient->phone}}</h6></td>
                                    <td><h6 class="text-center">{{$patient->email}}</h6></td>
                                    <td><h7 class="text-center">{{$patient->date_birth}}</h7></td>
                                    <td><h6 class="text-center">{{$patient->gender}}</h6></td>
                                    <td><h6>{{$patient->father_fullname}}</h6></td>
                                    <td><h6 class="text-center">{{$patient->father_dni}}</h6></td>
                                    <td><h6>{{$patient->mother_fullname}}</h6></td>
                                    <td><h6 class="text-center">{{$patient->mother_dni}}</h6></td>
                                    <td><h6 class="text-center">{{$patient->gender}}</h6></td>
                                    <td><h6 class="text-center">{{$patient->created_at}}</h6></td>
                                    <td><h6 class="text-center">{{$patient->updated_at}}</h6></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>