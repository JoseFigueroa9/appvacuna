<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{$componentName}} | {{$pageTitle}}</b>
                </h4>
                <ul class="tabs tab-pills">
                    @can('Agregar_Roles')
                    <li>
                        <a href="javascript:void(0)" class="tabmenu bg-dark" data-toggle="modal" data-target="#theModal">Agregar</a>
                    </li>
                    @endcan
                </ul>
            </div>
            @can('Buscar_Roles')
            @include('common.searchbox')
            @endcan
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered striped mt-1">
                        <thead class="text-white" style="background: #3b3f5c">
                            <tr>
                                <th class="table-th text-white">ID</th>
                                <th class="table-th text-white text-center">Descripción</th>
                                <th class="table-th text-white text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td><h6>{{$role->id}}</h6></td>
                                    <td><h6 class="text-center">{{$role->name}}</h6></td>
                                    <td class="text-center">
                                    @can('Editar_Roles')
                                    <a href="javascript:void(0)" wire:click="Edit({{$role->id}})" class="btn btn-dark mtmobile" title="Editar Registro">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan
                                    @can('Eliminar_Roles')
                                    <a href="javascript:void(0)" onclick="Confirm('{{$role->id}}')" class="btn btn-dark" title="Eliminar Registro">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$roles->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.roles.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('role-added', msg => {
            $('#theModal').modal('hide')
            noty(msg)
        })
        window.livewire.on('role-updated', msg => {
            $('#theModal').modal('hide')
            noty(msg)
        })
        window.livewire.on('role-deleted', msg => {
            noty(msg)
        })
        window.livewire.on('role-exists', msg => {
            noty(msg)
        })
        window.livewire.on('role-error', msg => {
            noty(msg)
        })
        window.livewire.on('hide-modal', msg => {
            $('#theModal').modal('hide')
        })
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        })
        
    });

    function Confirm(id)
    {
        swal({
            title: 'Confirmar',
            text: '¿Deseas eliminar el registro?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3b3f5c',
            confirmButtonText: 'Aceptar'

        }).then(function(result){
            if(result.value){
                window.livewire.emit('deleteRow',id)
                swal.close()
            }
        })
    }
</script>
