<?php

namespace App\Http\Controllers\Auth;
use auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function CheckRole()
    {
        if (auth()->user()->role == 'admin') {
            return redirect('/admin/dashboard');
        }
        elseif(auth()->user()->role == 'users'){
            return redirect('/users');
        }
        else{
            return auth()->logout();
        }
    }
}
