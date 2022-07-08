<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentUser extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const CLICK = 1;
    const PAYMEE = 2;
    const APELSIN = 3;
}
