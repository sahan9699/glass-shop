<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PostalCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'description',
    ];

}
