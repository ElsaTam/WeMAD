<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Event;

class PagesController extends BaseRedirectController
{
    public function getHome() {
        return view('home');
    }

    public function getLinks() {
        return view('links');
    }

    public function getContact() {
        return view('contact');
    }
}
