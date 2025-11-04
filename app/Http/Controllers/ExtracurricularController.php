<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extracurricular;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $extracurriculars = $user->extracurriculars;
        return view('extracurriculars.index', compact('extracurriculars'));
    }
}
