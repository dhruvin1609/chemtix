<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeDescription extends Model
{
    use HasFactory;

    protected $table = 'home_description';

    protected $fillable = [
        'description',
        'title',
        'image',
        
    ];
}
