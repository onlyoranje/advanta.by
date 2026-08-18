<?php

namespace App\Http\Controllers;

use App\Models\StaticPages;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function pages_dashboard()
    {
        $pages = StaticPages::orderBy('sort')->get();
        return view('pages.dashboard', ['title' => 'Статические страницы', 'pages' => $pages]);
    }

    public function pages_add()
    {
        return view('pages.add', ['title' => 'Добавление страницы']);
    }

    public function pages_add_db(Request $request)
    {
        $active = 'N';
        if ($request->active == 'Y') {
            $active = 'Y';
        }

        $content = $request->text ?? $request->content ?? '';

        $pages = StaticPages::create([
            'title' => $request->title,
            'content' => $content,
            'sort' => $request->sort ?? 500,
            'active' => $active,
            'url' => $request->url,
        ]);

        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $filename = $request->file('img')->store('media');
            $file_name = explode('/', $filename);
            $pages->fill(['image' => $file_name[1] ?? $file_name[0]]);
            $pages->save();
        }

        return redirect()->route('pages_dashboard');
    }

    public function pages_edit(StaticPages $pages)
    {
        return view('pages.edit', ['title' => 'Редактирование страницы', 'page' => $pages]);
    }

    public function pages_update(Request $request, StaticPages $pages)
    {
        $active = 'N';
        if ($request->active == 'Y') {
            $active = 'Y';
        }

        $content = $request->text ?? $request->content ?? '';

        $pages->fill([
            'title' => $request->title,
            'content' => $content,
            'sort' => $request->sort ?? 500,
            'active' => $active,
            'url' => $request->url,
        ]);
        $pages->save();

        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $filename = $request->file('img')->store('media');
            $file_name = explode('/', $filename);
            $pages->fill(['image' => $file_name[1] ?? $file_name[0]]);
            $pages->save();
        }

        return redirect()->route('pages_dashboard');
    }

    public function pages_delete(StaticPages $pages)
    {
        return view('pages.delete', ['title' => 'Удаление страницы', 'page' => $pages]);
    }

    public function pages_destroy(StaticPages $pages)
    {
        $pages->delete();
        return redirect()->route('pages_dashboard');
    }

    public function detail($url)
    {
        $page = StaticPages::where('url', $url)->where('active', 'Y')->firstOrFail();
        return view('pages.detail', ['title' => $page->title, 'page' => $page]);
    }
}