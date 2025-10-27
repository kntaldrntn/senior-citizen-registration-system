<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeniorCitizen extends Model
{
    use HasFactory;
    protected $table = 'senior_citizen';

    protected $fillable = [
        'name',
        'contact_number',
        'address',
        'email',
        'birth_date',
        'photo_image',
    ];
}
