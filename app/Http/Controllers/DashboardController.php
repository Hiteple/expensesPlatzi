<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexAction(Request $request)
    {
        return view('test', [
            'title' => $request->query('title', 'Valor default')
        ]);
    }
}
