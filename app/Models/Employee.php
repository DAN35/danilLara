<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'first_name',
        'last_name',
        'second_name',
        'work_time_start',
        'work_time_end',
    ];
}
