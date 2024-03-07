<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SelectedDate;


class SelectedDateController extends Controller
{
    public function showForm()
    {
        return view('calendar_form');
    }
    
    public function saveDateAndTime(Request $request)
    {
        $request->validate([
            
            'selected_date_with_day' => 'required|string',
            'selected_time' => 'required|string'
        ]);

        $selectedDateWithDay = $request->selected_date_with_day;
        $selectedTime = $request->selected_time;

        SelectedDate::create([
            'selected_date_with_day' => $selectedDateWithDay,
            'selected_time' => $selectedTime,
        ]);

        return redirect()->back()->with('success', 'Date selected successfully.');
    }
}
