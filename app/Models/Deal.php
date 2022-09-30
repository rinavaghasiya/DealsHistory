<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;
    public $table = 'deal';
    protected $fillable = [
        'Deal', 'ID','Orders','Position','Login','Name','Time','Type','Entry','Symbol','Volume','Price','SL','TP','Reason','Commission','Fee',
        'Swap','Profit','Dealer','Currency','Comment',
    ];
}
