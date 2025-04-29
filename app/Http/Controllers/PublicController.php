<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage()
    {
        return view('welcome');
    }

    public function collection()
    {
        return view('clothes.collezione');
    }

    public function dove()
    {
        return view ('dove');
    }

    public function contatti()
    {
        return view ('contatti');
    }
}
