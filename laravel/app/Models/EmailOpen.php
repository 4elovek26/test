<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailOpen extends Model
{
    protected $table="email_open";

    protected $fillable = [
      'name'
    ];

    use HasFactory;
}
