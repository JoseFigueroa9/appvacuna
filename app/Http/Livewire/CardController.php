<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\Patient;
use App\Models\Vaccine;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use PDF;
use Excel;
use App\Exports\CardExport;


class CardController extends Component
{
  use WithPagination;
  use WithFileUploads;

  public $total = 10, $itemsQuantity = 1, $cart = [];
  public $dni, $patient, $vaccines, $vaccine_id, $lot_number, $number_dosis, $date, $locale, $search, $selected_id, $pageTitle, $componentName;

  private $pagination = 5;

  public function paginationView()
  {
    return 'vendor.livewire.bootstrap';
  }

  public function mount()
  {
    $this->pageTitle = 'Listado';
    $this->componentName = 'Ficha de Vacunación';
    $this->vaccines = Vaccine::all();
    if (!$this->vaccines) {
      $this->vaccines = [];
    }
    $this->vaccine_id = 'Elegir';
  }

  public function generar_excel()
    {
        return Excel::download(new CardExport,'listafichadevacunas.xlsx');
    }

  public function generar_pdf3()
  {
      $data = Card::all();
      $pdf = PDF::loadView('livewire.card.generar_pdf3', compact('data'));
      return $pdf->download('fichasvacunas.pdf');
  }

  public function render()
  {
    if (strlen($this->search) > 0)
      $data = Card::with(['patient', 'vaccine'])->where('dni', '=', $this->search)
        ->orderBy('id', 'desc')
        ->paginate($this->pagination);
    else
      $data = Card::with(['patient', 'vaccine'])->orderBy('id', 'desc')->paginate($this->pagination);

    return view('livewire.card.component', ['card' => $data])
      ->extends('layouts.theme.app')
      ->section('content');

    /* return view('livewire.patient.patients'); */
  }

  public function Edit($id)
  {
    $record = Card::with(['patient', 'vaccine'])->find($id);
    $this->dni = $record->patient->dni;
    $this->selected_id = $record->id;
    $this->patient = $record->patient->toArray();

    $this->number_dosis = $record->number_dosis;
    $this->date = $record->date;
    $this->locale = $record->locale;
    $this->vaccine_id = $record->vaccine_id;
    $this->lot_number = $record->vaccine->lot_number;

    $this->emit('modal-show', 'Show modal!');
  }

  public function LoadDni()
  {
    if ($this->dni != '') {
      $patient = Patient::where('dni', '=', $this->dni)->first();
      if (!$patient) {
        $this->patient = null;
        $this->emit('card-dni', 'Dni No existe');
        return false;
      }
      $this->patient = $patient->toArray();
    }
    // $this->vaccines = Card::where('dni', '=', $this->dni)->get();
  }
  public function Store()
  {
    $rules = [
      'dni' => 'required|integer|exists:patients,dni',
      'vaccine_id' => 'required|integer|exists:vaccines,id',
      'number_dosis' => 'required|integer',
      'date' => 'required|date',
      'locale' => 'required|string',
    ];

    $messages = [
      'dni.required' => 'El DNI es requerido',
      'dni.exists' => 'El DNI no existe',
      'dni.integer' => 'El DNI debe ser un numero entero',
    ];

    $this->validate($rules, $messages);

    $card = Card::create([
      'number_dosis' => $this->number_dosis,
      'patient_id' => $this->patient['id'],
      'date' => $this->date,
      'locale' => $this->locale,
      'vaccine_id' => $this->vaccine_id,
    ]);
    DB::table('vaccines')->where('id', $this->vaccine_id)->update(['stock' => DB::raw("stock - {$this->number_dosis}")]);
    $this->resetUI();
    $this->emit('card-updated', 'Ficha de Vacunación Agregada');
  }

  public function Update()
  {
    $rules = [
      'vaccine_id' => 'required|integer|exists:vaccines,id',
      'number_dosis' => 'required|integer',
      'date' => 'required|date',
      'locale' => 'required|string',
    ];

    $messages = [
      'vaccine_id.required' => 'La vacuna es requerido',
    ];

    $this->validate($rules, $messages);

    $card = Card::find($this->selected_id);
    DB::table('vaccines')->where('id', $card->vaccine_id)->update(['stock' => DB::raw("stock + {$card->number_dosis}")]);
    DB::table('vaccines')->where('id', $this->vaccine_id)->update(['stock' => DB::raw("stock - {$this->number_dosis}")]);
    $card->update([
      'number_dosis' => $this->number_dosis,
      'date' => $this->date,
      'locale' => $this->locale,
      'vaccine_id' => $this->vaccine_id,
    ]);
    $this->resetUI();
    $this->emit('card-updated', 'Ficha de Vacunación Actualizada');
  }

  public function resetUI()
  {
    $this->dni = '';
    $this->patient = '';
    $this->number_dosis = '';
    $this->date = '';
    $this->locale = '';
    $this->vaccine_id = 'Elegir';
    $this->lot_number = '';
    $this->search = '';
    $this->selected_id = 0;
    $this->resetValidation();
    $this->resetPage();
  }

  protected $listeners = [
    'deleteRow' => 'Destroy'
  ];

  public function Destroy(Card $card)
  {
    //$card = Card::find($this->selected_id);
    DB::table('vaccines')->where('id', $card->vaccine_id)->update(['stock' => DB::raw("stock + {$card->number_dosis}")]);
    $card->delete();

    $this->resetUI();
    $this->emit('card-deleted', 'Ficha de Vacunación Eliminada');
  }

  // public function render()
  // {
  //   return view('livewire.pos.component')->extends('layouts.theme.app')->section('content');
  // }
}