<?php

namespace App\Http\Controllers\Users;


use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersHomeController extends Controller
{
	public function UsersHomePage()
	{
		return "Users";
	}
    
}
