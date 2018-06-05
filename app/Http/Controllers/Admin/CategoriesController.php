<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\CategoryLang;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * show categories table
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Category $category)
    {
        $categories = $category->all();
        $parentCategory = $category->where('old_number', null)->pluck('ru_title', 'id')->toArray();

        return view('admin.categories.all', compact('categories', 'parentCategory'));
    }

    /**
     * show lang category
     * @param $id
     * @param $locale
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCategory($id, $locale, Category $category)
    {
        $category = $category->findOrFail($id);
        $parentCategories = $category->where('old_number', null)->pluck('ru_title', 'id')->toArray();
        app()->setLocale($locale);

        return view('admin.categories.update', compact('category', 'parentCategories'));
    }

    /**
     * common update category
     * @param $id
     * @param CategoryRequest $request
     * @param Category $categories
     * @param CategoryService $categoryService
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function updateCategory($id, CategoryRequest $request, Category $categories, CategoryService $categoryService)
    {
        $category = $categories->findOrFail($id);

        if ($categoryService->updateCategory($category, $request)) {
            return back()->with('success', 'Успешно обновлено');
        } else {
            return back()->with('danger', 'category update failed');
        }
    }

    /**
     * update lang category
     * @param $id
     * @param $locale
     * @param Request $request
     * @param CategoryLang $categoryLang
     * @param CategoryService $categoryService
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function updateLangCategory($id, $locale, Request $request, CategoryLang $categoryLang, CategoryService $categoryService)
    {
        $request->validate([
            'description' => 'max:5000',
            'seo_title' => 'max:250',
            'seo_description' => 'max:250',
            'keywords' => 'max:250',
        ]);
        $category = $categoryLang->where('category_id', $id)->where('locale', $locale)->firstOrFail();
        if ($categoryService->updateLangCategory($category, $request)) {
            return back()->with('success', 'Успешно обновлено');
        } else {
            return back()->with('danger', 'category update failed');
        }
    }
}
