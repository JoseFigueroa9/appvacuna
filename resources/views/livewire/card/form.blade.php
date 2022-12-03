@include('common.modalHead')

<h4 class="card-title">
    <b>Datos del Paciente</b>
</h4>
<div class="row">
    <div class="col-sm-6 col-md-3">
        <div class="form-group">
            <label>DNI</label>
            @if ($selected_id < 1)
                <input type="text" wire:model.lazy="dni" wire:blur="LoadDni()" class="form-control"
                    placeholder="Ej: 77788899">
                @error('dni')
                    <span class="text-danger er">{{ $message }}</span>
                @enderror
            @else
                <input type="text" wire:model.lazy="dni" class="form-control disabled" disabled>
            @endif
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="form-group">
            <label>Nombres</label>
            <input type="text" wire:model.lazy="patient.name" class="form-control disabled" disabled>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="form-group">
            <label>Apellidos</label>
            <input type="text" wire:model.lazy="patient.lastname" class="form-control disabled" disabled>
        </div>
    </div>



    <div class="col-sm-6 col-md-3">
        <div class="form-group">
            <label>Teléfono</label>
            <input type="tel" wire:model.lazy="patient.phone" class="form-control disabled" disabled>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="form-group">
            <label>E-mail</label>
            <input type="email" wire:model.lazy="patient.email" class="form-control disabled" disabled>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="form-group">
            <label>Fecha Nacimiento</label>
            <input type="date" wire:model.lazy="patient.date_birth" class="form-control disabled" disabled>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="form-group">
            <label>Sexo</label>
            <input type="text" wire:model.lazy="patient.gender" class="form-control disabled" disabled>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="form-group">
            <label>Nombre Padre</label>
            <input type="text" wire:model.lazy="patient.father_fullname" class="form-control disabled" disabled>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="form-group">
            <label>DNI Padre</label>
            <input type="text" wire:model.lazy="patient.father_dni" class="form-control disabled" disabled>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="form-group">
            <label>Nombre Madre</label>
            <input type="text" wire:model.lazy="patient.mother_fullname" class="form-control disabled" disabled>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="form-group">
            <label>DNI Madre</label>
            <input type="text" wire:model.lazy="patient.mother_dni" class="form-control disabled" disabled>
        </div>
    </div>
</div>
<h4 class="card-title">
    <b>Datos de la ficha de vacunación</b>
</h4>
<div class="row">

    <div class="col-sm-6 col-md-3" style="padding: 5px">
        <label>Vacunas</label>
        <select wire:model='vaccine_id' class="form-control" onchange="changeVacuna()" id="vaccine_id">
            <option value="Elegir" disabled>Elegir</option>
            @foreach ($vaccines as $vaccine)
                <option value="{{ $vaccine->id }}" data-lote="{{ $vaccine->lot_number }}">{{ $vaccine->name }}
                </option>
            @endforeach
        </select>
        @error('vaccine_id')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-sm-6 col-md-2" style="padding: 5px">
        <label>No. Dosis</label><br>
        <input type="number" min="1" wire:model.lazy="number_dosis" class="form-control">
        @error('number_dosis')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-sm-6 col-md-2" style="padding: 5px">
        <label>No. Lote</label><br>
        <input type="text" value="{{ $lot_number }}" class="form-control disabled" disabled id="lot_number">
    </div>
    <div class="col-sm-6 col-md-2" style="padding: 5px">
        <label>Fecha</label><br>
        <input type="date" wire:model.lazy="date" class="form-control">
        @error('date')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-sm-6 col-md-3" style="padding: 5px">
        <label>Lugar</label><br>
        <input type="text" wire:model.lazy="locale" class="form-control">
        @error('locale')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>
</div>
@include('common.modalFooter')
