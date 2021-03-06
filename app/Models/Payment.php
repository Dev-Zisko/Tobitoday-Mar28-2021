<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'rate',
        'method',
        'voucher',
        'status',
        'id_user',
        'id_beneficiary',
    ];
}
