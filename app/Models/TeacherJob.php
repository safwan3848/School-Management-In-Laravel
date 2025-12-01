<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'department',
        'location',
        'description',
        'type',
        'status',
    ];
}
