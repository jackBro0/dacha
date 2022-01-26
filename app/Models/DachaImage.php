<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DachaImage extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['updated_at'];
}
