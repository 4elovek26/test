<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    protected $fillable = [
      'name',
      'created_at',
      'id',
    ];

    use HasFactory;
}
