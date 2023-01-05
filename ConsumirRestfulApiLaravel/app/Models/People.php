<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'alcada',
        'pes',
        'colorCabell',
        'colorPell',
        'colorUlls',
        'anyNaixement',
        'genere',
        'planeta'
    ];
}
