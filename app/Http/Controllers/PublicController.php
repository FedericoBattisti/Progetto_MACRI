<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage()
    {
        return view('welcome', [
            'title' => 'Homepage - MÀCRÌ',
        ]);
    }

    public function collection()
    {
        return view('clothes.collezione', [
            'title' => 'Promozioni - MÀCRÌ',
        ]);
    }

    public function dove()
    {
        return view ('dove', [
            'title' => 'Dove Siamo e orario - MÀCRÌ',
        ]);
    }

    public function contatti()
    {
        return view ('contatti', [
            'title' => 'Contatti - MÀCRÌ',
        ]);
    }

    public function collectionSummer()
    {
        return view('clothes.collezione-summer', [
            'title' => 'Collezione Estate - MÀCRÌ',
        ]);
    }

    public function collectionAutumn()
    {
        return view('clothes.collezione-autumn', [
            'title' => 'Collezione Autunno - MÀCRÌ',
        ]);
    }

    public function collectionWinter()
    {
        return view('clothes.collezione-winter', [
            'title' => 'Collezione Inverno - MÀCRÌ',
        ]);
    }

    public function collectionSpring()
    {
        return view('clothes.collezione-spring', [
            'title' => 'Collezione Primavera - MÀCRÌ',
        ]);
    }
}
