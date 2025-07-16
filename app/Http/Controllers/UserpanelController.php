<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserpanelController extends Controller
{
    public function userDashboard()
    {
        // Return the user dashboard view
        return view('userpanel.dashboard');
    }
}
