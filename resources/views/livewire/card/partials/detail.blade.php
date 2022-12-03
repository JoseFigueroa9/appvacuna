<div class="widget widget-chart-one" style="padding: 20px">
    <div class="widget-heading ">
        <h4 class="card-title">
            <b>{{ $componentName }} | {{ $pageTitle }}</b>
        </h4>
        <ul class="tabs tab-pills">
                    @can('EXCEL_Fichavacuna')
                    <li>
                        <a href="{{ route('descargar-excel3')}}" class="tabmenu bg-success" >EXCEL</a>
                    </li>
                    @endcan
                    @can('PDF_Fichavacuna')
                    <li>
                        <a href="{{ route('descargar-pdf3')}}" class="tabmenu bg-danger">PDF</a>
                    </li>
                    @endcan
            @can('Agregar_Fichavacuna')
            <li>
                <a href="javascript:void(0)" class="tabmenu bg-dark" data-toggle="modal" data-target="#theModal">Agregar</a>
            </li>
            @endcan
        </ul>
    </div>
    @can('Buscar_Fichavacuna')
    @include('common.searchbox')
    @endcan
    <div class="widget-content">
        @if ($total > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-striped mt-1">
                    <thead class="text-white" style="background: #3b3f5c">
                        <tr>
                            <th class="table-th text-left text-white">DNI</th>
                            <th class="table-th text-left text-white">Nombre del Paciente</th>
                            <th class="table-th text-left text-white">Vacuna</th>
                            <th class="table-th text-left text-white">Dosis</th>
                            <th class="table-th text-left text-white">Lote</th>
                            <th class="table-th text-left text-white">Fecha</th>
                            <th class="table-th text-left text-white">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($card as $item)
                            <tr>
                                <td><h6>{{ $item->patient->dni }}</h6></td>
                                <td><h6>{{ $item->patient->name }} {{ $item->patient->lastname }}</h6></td>
                                <td><h6>{{ $item->vaccine->name }}</h6></td>
                                <td><h6>{{ $item->number_dosis }}</h6></td>
                                <td><h6>{{ $item->vaccine->lot_number }}</h6></td>
                                <td><h6>{{ $item->date }}</h6></td>
                                <td class="text-center">
                                    @can('Actualizar_Fichavacuna')
                                    <a href="javascript:void(0)" wire:click.prevent="Edit({{ $item->id }})"
                                        class="btn btn-dark mtmobile" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan

                                    @can('Eliminar_Fichavacuna')
                                    <button
                                        onclick="Confirm('{{ $item->id }}', 'removeItem', '¿Confirmas Eliminar el registro?')"
                                        class="btn btn-dark mbmobile">
                                        <i class="fas fa-trash-alt">
                                        </i>
                                    </button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h5 class="text-center text-muted">Agrega vacuna a la Ficha</h5>
        @endif

        <div wire:loading.inline wire:target="saveSale">
            <h4 class="text-danger text-center">Guardando Ficha...</h4>
        </div>

    </div>
</div>
