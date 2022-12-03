<?php

namespace App\Exports;

use App\Models\Patient;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PatientsExport implements /*FromCollection*/ FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): view
    {
        return view('livewire.patient.excel2', [
            'patients' => Patient::all()
        ]);
    }

    /*
    public function collection()
    {
        return Patient::all();
    }*/
}
