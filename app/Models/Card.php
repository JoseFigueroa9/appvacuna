<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
  use HasFactory;

  protected $fillable = [
    'number_dosis',
    'date',
    'status',
    'vaccine_id',
    'patient_id',
    'locale'
  ];
  # relacion uno a muchos con vaccine
  public function vaccine()
  {
    return $this->belongsTo(Vaccine::class);
  }
  # relacion uno a muchos con patient
  public function patient()
  {
    return $this->belongsTo(Patient::class);
  }
}