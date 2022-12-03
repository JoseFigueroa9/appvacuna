<?php

namespace App\Exports;

use App\Models\Vaccine;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class VaccinesExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): view
    {
        return view('livewire.vaccines.excel', [
            'vaccines' => Vaccine::all()
        ]);
    }
}
