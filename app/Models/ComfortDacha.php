<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComfortDacha extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    use HasFactory;
}
