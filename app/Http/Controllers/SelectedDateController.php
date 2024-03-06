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
    
    public function saveDate(Request $request)
    {
        $request->validate([
            
            'selected_date_with_day' => 'required|string',
        ]);

        $selectedDateWithDay = $request->selected_date_with_day;

        SelectedDate::create([
            'selected_date_with_day' => $selectedDateWithDay,
        ]);

        return redirect()->back()->with('success', 'Date selected successfully.');
    }
}
