<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        if (auth()->user()->hasRole('admin'))
        {
            return redirect()->route('admin.dashboard');
        }
        elseif (auth()->user()->hasRole('pemilih'))
        {
            return redirect()->route('frontend.index');
        }
        else
        {
            return view('dashboard');
        }
    }
}
