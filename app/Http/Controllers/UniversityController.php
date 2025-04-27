<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index()
    {
        $universities=University::pluck('name');
        $facultyCounts = University::withCount('facultets')->pluck('facultets_count');
        // dd($facultyCounts);
        return view('Universitet.index',['universities'=>$universities,'facultyCounts'=>$facultyCounts]);
    }
}
