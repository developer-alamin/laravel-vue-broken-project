<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminIdController extends Controller
{
    public function AdminStudentIdPage()
    {
    	return Inertia::render('Admin/Id/IdAdd');
    }
}
