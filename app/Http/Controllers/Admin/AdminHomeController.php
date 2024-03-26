<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminHomeController extends Controller
{
    public function AdminHomePage()
	{
		return Inertia::render('Admin/Home');
	}
}
