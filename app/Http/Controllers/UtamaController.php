<?php

namespace App\Http\Controllers;

use App\Models\articles;
use App\Models\data_diri;
use App\Models\dayatampung;
use App\Models\prestasi;
use App\Models\profil;
use Illuminate\Http\Request;

class UtamaController extends Controller
{
    protected $prestasi, $article, $profil, $data_diri;
    public function __construct(prestasi $prestasi, articles $article, profil $profil, data_diri $data_diri)
    {
        $this->prestasi = $prestasi;
        $this->article = $article;
        $this->profil = $profil;
        $this->data_diri = $data_diri;
    }

    public function index()
    {
        $data = $this->prestasi->get_prestasi();
        $articles = $this->article->get_article();
        $profil = $this->profil->firstOrFail();
        $groupedData = $data->groupBy('b_prestasi');
        $internationalData = $groupedData['internasional'] ?? collect();
        $nationalData = $groupedData['nasional'] ?? collect();
        $totalDaftar = $this->data_diri->countDataDiri();
        $countToday = $this->data_diri->countToday();

        $dayaTampung = dayatampung::first();

        return view('utama', compact('totalDaftar', 'countToday', 'dayaTampung', 'internationalData', 'nationalData', 'articles', 'profil'));
    }

    public function articleDetail($slug)
    {
        $article = $this->article->where('slug', $slug)->firstOrFail();
        return view('article_detail', compact('article'));
    }
}
