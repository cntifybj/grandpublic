<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenterOfInterest extends Model
{
    use HasFactory;

    protected $table = 'centers_of_interest';

    protected $fillable = [
        'name',
        'short_identifier',
        'short_description',
    ];
}
