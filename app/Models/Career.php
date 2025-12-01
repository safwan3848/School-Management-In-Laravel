<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'dob',
        'gender',
        'address',
        'position',
        'highest_qualification',
        'experience',
        'subjects',
        'preferred_grade',
        'expected_salary',
        'availability',
        'resume_path',
        'photo_path',
        'other_docs_path',
        'message',
        'status'
    ];
}
