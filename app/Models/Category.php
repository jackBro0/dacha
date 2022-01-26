<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $guarded = [];
    protected $hidden = ['updated_at', 'deleted_at'];
    use SoftDeletes;

    use HasFactory;
}
