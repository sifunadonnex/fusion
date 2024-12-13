<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    use HasFactory;
    protected $table = 'aircrafts';
    protected $fillable = [
        'registration',
        'program',
        'serial_number',
        'manufacturer_model',
        'total_hours',
        'total_hours_date',
        'total_cycles',
        'total_cycles_date',
        'date_of_manufacture',
    ];
}
