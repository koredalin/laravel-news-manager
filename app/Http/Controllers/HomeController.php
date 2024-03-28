<?php

namespace App\Http\Controllers;

use Parsedown;

class HomeController extends Controller
{
    public function index()
    {
        $parsedown = new Parsedown();
        $readmeContent = file_get_contents(base_path('README.md'));
//        $readmeContent = "# Заглавие\n\nТова е *курсив* и това е **удебелен** текст.";
        $readmeHtml = $parsedown->text($readmeContent);

        return view('home', compact('readmeHtml'));
    }
}
