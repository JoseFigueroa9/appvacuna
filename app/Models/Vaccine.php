<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'description',
    'stock',
    'alerts',
    'status',
    'category_id'
  ];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
  # relacion uno a muchos inversa cob card
  public function cards()
  {
    return $this->hasMany(Card::class);
  }
}