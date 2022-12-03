<div>
    <style></style>

    <div class="row layout-top-spacing">
        <div class="col-sm-12">
            <!-- DETALLES -->
            @include('livewire.card.partials.detail')
        </div>

        <div class="col-sm-12 col-md-4">
            <!-- TOTAL -->
            @include('livewire.card.partials.total')



            <!-- DENOMINACIONES -->

        </div>
        @include('livewire.card.form')
    </div>



</div>

<script>
    var lastDni = '';

    function changeVacuna() {
        const vacuna = document.getElementById('vaccine_id');
        const sel = vacuna.options[vacuna.selectedIndex];
        $("#lot_number").val(sel.getAttribute("data-lote"));
    }
    document.addEventListener('DOMContentLoaded', function() {
        window.livewire.on('card-dni', (msg) => {
            noty(msg)
        });

        window.livewire.on('card-added', msg => {
            $('#theModal').modal('hide')
            noty(msg)
        });
        window.livewire.on('card-updated', msg => {
            $('#theModal').modal('hide')
            noty(msg)
        });
        window.livewire.on('card-deleted', msg => {
            //noty
            noty(msg)
        });
        window.livewire.on('modal-show', msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('modal-hide', msg => {
            $('#theModal').modal('hide')
        });
        /* $('#theModal').on('hidden.bs.modal', function(e) {
            $('.er').css('display','none')
        }); */

        window.livewire.on('hidden.bs.modal', msg => {
            $('.er').css('display', 'none')
        });



    });

    function Confirm(id) {
        swal({
            title: 'Confirmar',
            text: '¿Deseas eliminar el registro?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3b3f5c',
            confirmButtonText: 'Aceptar'

        }).then(function(result) {
            if (result.value) {
                window.livewire.emit('deleteRow', id)
                swal.close()
            }
        })
    }
</script>
