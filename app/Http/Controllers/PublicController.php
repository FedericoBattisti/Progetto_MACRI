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
        // Query base
        $query = Clothe::whereNull('deleted_at')
            ->whereHas('images')
            ->with('primaryImage');

        // Ricerca per testo
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('material', 'like', "%{$search}%")
                    ->orWhere('brand', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
            });
        }

        // Filtro per brand
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        // Filtro per categoria
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Ordinamento
        $sortBy = $request->get('sort', 'newest');
        switch ($sortBy) {
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
                $query->orderBy('created_at', 'desc');
        }

        $clothes = $query->get();

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
            'selectedSort' => $sortBy,
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
}
