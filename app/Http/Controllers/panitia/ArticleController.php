<?php

namespace App\Http\Controllers\panitia;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    protected $articles;
    public function __construct(articles $articles)
    {
        $this->articles = $articles;
    }

    public function index()
    {
        $data = $this->articles->get_article();
        return view('panitia.articles', compact('data'));
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->validated();
        if (articles::where('title', $request->get('title'))->exists()) {
            $message = 'Artikel dengan title ini sudah ada';
            return redirect('/articles')->with('data_available', $message);
        }

        if ($request->has('article_img_path')) {
            $file = $request->file('article_img_path');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            Storage::disk('article_img')->put($filename, $file->get());
            $data['article_img_path'] = '/article_img/' . $filename;
        }
        $data['slug'] = Str::slug($request->get('title'));
        $data['is_active'] = 1;
        $article = new articles($data);
        $article->save();

        return redirect('/articles')->with('success', 'Berhasil Menambah Artikel');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $article = $this->articles->findOrFail($id);

        if ($request->file('article_img_path')) {
            $file = $request->file('article_img_path');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            Storage::disk('article_img')->put($filename, $file->get());
            $data['article_img_path'] = '/article_img/' . $filename;
        }
        $article->update($data);

        return redirect('/articles')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $data = articles::findOrFail($id);
        $data->delete();

        return redirect('/articles')->with('success', 'Data berhasil dihapus');
    }
}
