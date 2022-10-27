<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assign_weebhook extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'status',
    ];
}
