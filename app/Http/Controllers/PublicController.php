<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clothe;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function homepage()
    {
        return view('welcome', [
            'title' => 'Home'
        ]);
    }

    public function collection(Request $request)
    {
        $query = Clothe::query();

        // Applica filtri esistenti...
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Applica ordinamento...
        switch ($request->get('sort', 'newest')) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            default:
                $query->latest();
        }

        // Usa paginate invece di get
        $clothes = $query->paginate(21)->withQueryString();

        // Ottieni tutti i brand e categorie disponibili per i filtri
        $brands = Clothe::whereNull('deleted_at')
            ->whereNotNull('brand')
            ->distinct()
            ->pluck('brand')
            ->sort();

        $categories = Clothe::whereNull('deleted_at')
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category')
            ->sort();

        return view('clothes.collezione', [
            'title' => 'Collezione',
            'clothes' => $clothes,
            'category' => 'Tutta la Collezione',
            'brands' => $brands,
            'categories' => $categories,
            'selectedBrand' => $request->brand,
            'selectedCategory' => $request->category,
            'selectedSort' => $request->get('sort', 'newest'),
            'searchQuery' => $request->search
        ]);
    }

    public function show(Clothe $clothe)
    {
        $clothe->load('images');

        return view('clothes.dettaglio', [
            'title' => $clothe->name,
            'clothe' => $clothe
        ]);
    }

    public function dove()
    {
        return view('dove', [
            'title' => 'Dove Siamo'
        ]);
    }

    public function contatti()
    {
        return view('contatti', [
            'title' => 'Contatti'
        ]);
    }
    public function chiSiamo()
    {
        return view('chi-siamo', [
            'title' => 'Chi Siamo'
        ]);
    }

    public function privacy()
    {
        return view('privacy', [
            'title' => 'Privacy Policy'
        ]);
    }
}
