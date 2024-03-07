<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedDate extends Model
{
    protected $fillable = [
        'selected_date',
        'selected_date_with_day',
        'selected_time'
    ];
}
