<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticlesController extends Controller
{
    /**
     * show all articles
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Article $article)
    {
        $articles = $article->all();

        return view('admin.articles.all', compact('articles'));
    }

    /**
     * show creation form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createArticle()
    {
        return view('admin.articles.add');
    }

    /**
     * store article
     * @param ArticleRequest $request
     * @param ArticleService $articleService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeArticle(ArticleRequest $request, ArticleService $articleService)
    {
        if ($articleService->storeArticle($request)) {
            return redirect(route('admin.articles.all'))->with('success', 'Сатья успешно создана');
        } else {
            return redirect(route('admin.articles.all'))->with('danger', 'Неудалось создать статью');
        }
    }

    /**
     * show article edit form
     * @param $id
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editArticle($id, Article $article)
    {
        $article = $article->findOrFail($id);

        return view('admin.articles.edit', compact('article'));
    }

    /**
     * update article
     * @param $id
     * @param Article $article
     * @param ArticleRequest $request
     * @param ArticleService $articleService
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function updateArticle(
        $id,
        Article $article,
        ArticleRequest $request,
        ArticleService $articleService
    ) {
        $article = $article->findOrFail($id);
        if ($articleService->updateArticle($article, $request)) {
            return back()->with('success', 'Успешно обновлено');
        } else {
            return back()->with('danger', 'article update failed');
        }
    }
}
