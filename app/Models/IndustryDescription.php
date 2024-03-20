<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryDescription extends Model
{
    use HasFactory;

    protected $table = 'industry_description';

    protected $fillable = [
        'title',
        'description',
    ];
}
