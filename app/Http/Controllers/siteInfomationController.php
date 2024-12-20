<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class siteInfomationController extends Controller
{
    public function about()
    {
        return view('siteInformation.about-us');
    }

    public function privacy()
    {
        return view('siteInformation.privacy-policy');
    }
}
