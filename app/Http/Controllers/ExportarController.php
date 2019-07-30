<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportarController extends Controller
{
    public function index()
    {

        return view(
            'exportar'
        );
    }

    
}
