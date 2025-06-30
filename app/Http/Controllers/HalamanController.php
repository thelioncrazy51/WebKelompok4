<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    /**
     * Halaman Home
     */
    public function index()
    {
        return view('pages.index', [
            'title' => 'Home'
        ]);
    }

    /**
     * Halaman Product
     */
    public function product()
    {
        return view('pages.product', [
            'title' => 'Product'
        ]);
    }

    /**
     * Halaman About Us
     */
    public function about()
    {
        return view('pages.about_us', [
            'title' => 'About Us'
        ]);
    }

    /**
     * Halaman Career
     */
    public function career()
    {
        return view('pages.career', [
            'title' => 'Career'
        ]);
    }

    /**
     * Halaman News & Article
     */
    public function newsAndArticle()
    {
        return view('pages.news_article', [
            'title' => 'News & Article'
        ]);
    }

    /**
     * Halaman Product
     */
    public function product()
    {
        return view('pages.product', [
            'title' => 'Product'
        ]);
    }
}


