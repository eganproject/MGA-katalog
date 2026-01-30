<?php

namespace App\Http\Controllers;

use App\Models\FeaturedCategory;
use App\Models\ProductCategory;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function index(): View
    {
        $featuredCategories = FeaturedCategory::with('category')
            ->orderBy('sort_order')
            ->limit(3)
            ->get();

        return view('landing', compact('featuredCategories'));
    }

    public function kategori(): View
    {
        $categories = ProductCategory::where('is_active', true)->orderBy('sort_order')->orderBy('name')->paginate(12);

        return view('kategori', compact('categories'));
    }

    public function tentang(): View
    {
        return view('tentang');
    }
}
