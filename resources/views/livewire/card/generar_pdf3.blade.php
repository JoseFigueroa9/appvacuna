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
            <h2 class="text-center" style="font-size: 21px; color: #3b3f5c">Fichas de vacunación<nav></nav></h2>
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered striped mt-1">
                        <thead class="text-white" style="background: #3b3f5c">
                            <tr>
                            <th class="table-th text-left text-white">DNI</th>
                            <th class="table-th text-left text-white">Nombre del Paciente</th>
                            <th class="table-th text-left text-white">Vacuna</th>
                            <th class="table-th text-left text-white">Dosis</th>
                            <th class="table-th text-left text-white">Lote</th>
                            <th class="table-th text-left text-white">Fecha</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td><h6>{{ $item->patient->dni }}</h6></td>
                                <td><h6>{{ $item->patient->name }} {{ $item->patient->lastname }}</h6></td>
                                <td><h6>{{ $item->vaccine->name }}</h6></td>
                                <td><h6>{{ $item->number_dosis }}</h6></td>
                                <td><h6>{{ $item->vaccine->lot_number }}</h6></td>
                                <td><h6>{{ $item->date }}</h6></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>