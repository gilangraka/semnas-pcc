<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        
        $navItems = [
            (object)['name' => 'Home','href' => '#'],
            (object)['name' => 'About','href' => '#about'],
            (object)['name' => 'Fillers','href' => '#fillers'],
            (object)['name' => 'Benefit','href' => '#benefit'],
            (object)['name' => 'FAQ','href' => '#faq'],
            (object)['name' => 'Techcomfest','href' => 'https://techcomfest.ukmpcc.org'],
        ];

        return view('pages.home', compact('navItems'));
    }
}
