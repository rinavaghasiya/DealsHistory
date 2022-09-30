<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealHistory extends Model
{
    use HasFactory;
   protected $fillable = [
							'Deal',
							'Ids',
							'Orders',
							'Position',
							'Login',
							'Name',
							'Time',
							'Type',
							'Entry',
							'Symbol',
							'Volume',
							'Price',
							'SL',
							'TP',
							'Reason',
							'Commission',
							'Fee',
							'Swap',
							'Profit',
							'Dealer',
							'Currency',
							'Comment'
							];
}
