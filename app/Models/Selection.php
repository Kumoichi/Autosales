<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    use HasFactory;


    protected $fillable = [
        'item_id', // Add item_id to the fillable array
        'selected_number', // Assuming you have selected_number as well
    ];
}
