<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        // revenue sum total price
        // transanction count

        $data = [
            'user' => $user,
        ];

        return view('pages.dashboard.admin.index', $data);
    }
}
