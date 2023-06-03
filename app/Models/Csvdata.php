<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Csvdata extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'student_name',
        'purpose',
        'course',
        'email',
        'director_name',
        'status'
    ];
}
