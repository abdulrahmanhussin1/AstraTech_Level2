<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchingData extends Model
{
    use HasFactory;
    protected $table = 'matching_data';
    protected $fillable = [
        'arabic_desc',
    ];
    
}
