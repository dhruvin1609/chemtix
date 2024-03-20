<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryServed extends Model
{
    use HasFactory;

    protected $table = 'industry_served';

    protected $fillable = [
        'title',
        'description',
    ];
}
