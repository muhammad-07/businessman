<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;
    public $fillable = [
        'code',
        'name',
        'ac_no',
        'opening_balance',
        
    ];
}
