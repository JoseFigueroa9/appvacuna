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
            <h2 class="text-center" style="font-size: 21px; color: #3b3f5c">Vacunas</h2>
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered striped mt-1">
                        <thead class="text-white" style="background: #3b3f5c">
                            <tr>
                                <th class="table-th text-white">Nombre</th>
                                <th class="table-th text-white text-center">Descripción</th>
                                <th class="table-th text-white text-center">Stock</th>
                                <th class="table-th text-white text-center">Inv. Min</th>
                                <th class="table-th text-white text-center">Número de lote</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $vaccine)
                            <tr>
                                <td><h6 class="text-center">{{$vaccine->name}}</h6></td>
                                <td><h6>{{$vaccine->description}}</h6></td>
                                <td><h6 class="text-center">{{$vaccine->stock}}</h6></td>
                                <td><h6 class="text-center">{{$vaccine->alerts}}</h6></td>
                                <td><h6 class="text-center">{{$vaccine->lot_number}}</h6></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>