<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AboutUsController extends Controller
{
    public function show()
    {
        return view('about');
    }


}
