<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'designation',
        'photo',
        'message',
        'status'
    ];
}
