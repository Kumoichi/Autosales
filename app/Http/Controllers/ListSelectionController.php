<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListSelectionController extends Controller
{
    public function listselection(){
        return view ("pages.listselection");
    }
}
