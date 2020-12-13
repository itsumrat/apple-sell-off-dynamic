<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorLoginController extends Controller
{
    public function vedorLoginForm()
    {
    	dd('ssssss');
        return view('auth.vendorlogin');
    }
}
