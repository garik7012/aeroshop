<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PageLangRequest;
use App\Models\PageLang;
use App\Services\PageLangService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PagesController extends Controller
{
    /**
     * show pages table
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Page $page)
    {
        $pages = $page->all();

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * show lang page
     * @param $id
     * @param $locale
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPage($id, $locale, Page $page)
    {
        $page = $page->findOrFail($id);
        app()->setLocale($locale);

        return view('admin.pages.update', compact('page'));
    }

    /**
     * update page
     * @param $id
     * @param PageLangRequest $request
     * @param PageLang $pageLang
     * @param PageLangService $pageLangService
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function updatePage($id, PageLangRequest $request, PageLang $pageLang, PageLangService $pageLangService)
    {
        $page = $pageLang->where('page_id', $id)->where('locale', $request->pageLocale)->firstOrFail();

        if ($pageLangService->updatePage($page, $request)) {
            return back()->with('success', 'Успешно обновлено');
        } else {
            return back()->with('danger', 'page update failed');
        }
    }
}
