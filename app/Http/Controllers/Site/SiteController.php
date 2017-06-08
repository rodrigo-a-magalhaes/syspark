<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{

    public function __construct()
    {
        //
    }

    public function entrada()
    {
        $title = 'Entrada/Cadastro';
        $active1 = "-ativo";
        return view('site.entrada', compact('title', 'active1'));
    }

    public function saida()
    {
        $title = 'Saida';
        $active2 = "-ativo";
        return view('site.saida', compact('title', 'active2'));
    }

    public function relatorio()
    {
        $title = 'Relatorio';
        $active3 = "-ativo";
        return view('site.relatorio', compact('title', 'active3'));
    }
}
