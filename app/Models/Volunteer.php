<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'phone_number',
        'age',
        'citizenship',
        'occupation',
        'email',
        'interested_in',
        'experience',
    ];
}
