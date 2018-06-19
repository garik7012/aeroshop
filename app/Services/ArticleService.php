<?php

namespace App\Services;

use App\Models\Article;
use Exception;
use Storage;

class ArticleService extends BaseService
{

    /**
     * update article
     * @param $article
     * @param $request
     * @return bool
     * @throws Exception
     */
    public function updateArticle($article, $request)
    {
        $this->beginTransaction();
        try {
            $article->fill($request->only(['title', 'description', 'seo_description', 'content', 'keywords', 'is_active']));
            if (!$article->save()) {
                throw new Exception('Article was not saved');
            }
            if ($request->hasFile('image')) {
                $path = $request->image->store('img/articles', 'public');
                if ($path) {
                    Storage::disk('public')->delete($article->image);
                    $article->image = $path;
                    $article->save();
                }
            }
        } catch (Exception $e) {
            return $this->rollback($e, 'Article update failed');
        }
        $this->commit();

        return true;
    }

    public function storeArticle($request)
    {
        $article = new Article();

        $this->beginTransaction();
        try {
            $article->fill($request->only(['title', 'description', 'seo_description', 'content', 'keywords', 'is_active']));
            if (!$article->save()) {
                throw new Exception('Article was not saved');
            }
            if ($request->hasFile('image')) {
                $path = $request->image->store('img/articles', 'public');
                if ($path) {
                    $article->image = $path;
                    $article->save();
                }
            }
        } catch (Exception $e) {
            return $this->rollback($e, 'Article create failed');
        }
        $this->commit();

        return true;
    }
}
