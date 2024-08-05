<?php

namespace App\Http\Controllers\Auth;
use auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function CheckRole()
    {
        if (auth()->user()->isAdmin == 1) {
            return redirect('/admin/dashboard');
        }
        elseif(auth()->user()->isAdmin == 0){
            return redirect('/users');
        }
        else{
            return auth()->logout();
        }
    }
}
