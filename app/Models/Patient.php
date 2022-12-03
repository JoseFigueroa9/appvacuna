<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'lastname',
    'dni',
    'phone',
    'email',
    'date_birth',
    'status',
    'father_fullname',
    'mother_fullname',
    'father_dni',
    'mother_dni',
    'gender'
  ];

  # relacion uno a muchos inversa cob card
  public function cards()
  {
    return $this->hasMany(Card::class);
  }
}