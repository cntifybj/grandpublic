<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffMember extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'role', 'profile_picture', 'suspended',];

    protected $guarded = ['first_login'];
}
