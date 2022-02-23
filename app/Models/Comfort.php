<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comfort extends Model
{
    protected $guarded = ['id'];
    protected $hidden = ['updated_at', 'deleted_at'];

    use SoftDeletes, HasFactory;
}
