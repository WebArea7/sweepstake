<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'l_name',
        'q3',
        'q4',
        'q5',
        'q6'
    ];
}
