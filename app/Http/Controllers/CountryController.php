<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Organisation;

class CountryController extends Controller
{
    public function getCountry($id) {
        $country = Country::with('organisations')->find($id);
        return view('ressources/in-the-world/pages/country')
                    ->with('country', $country);
    }
}
