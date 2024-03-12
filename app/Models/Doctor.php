<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_name',
        'doctor_specialis',
        'doctor_phone',
        'doctor_email',
        'doctor_photo',
        'doctor_address',
        'doctor_sip',
    ];
}
