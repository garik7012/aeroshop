<?php

namespace App\Services;

use Exception;
use Storage;

class CategoryService extends BaseService
{

    /**
     * update category
     * @param $category
     * @param $request
     * @return bool
     * @throws Exception
     */
    public function updateCategory($category, $request)
    {
        $this->beginTransaction();
        try {
            $category->fill($request->only(['ru_title', 'uk_title', 'en_title', 'parent_id', 'is_active']));
            if (!$category->save()) {
                throw new Exception('Category was not saved');
            }
            if ($request->hasFile('image')) {
                $path = $request->image->store('img/cat/big', 'public');
                if ($path) {
                    Storage::disk('public')->delete($category->image);
                    $category->image = $path;
                    $category->save();
                }
            }
            if ($request->hasFile('preview')) {
                $path = $request->preview->store('img/cat/small', 'public');
                if ($path) {
                    Storage::disk('public')->delete($category->preview);
                    $category->preview = $path;
                    $category->save();
                }
            }
        } catch (Exception $e) {
            return $this->rollback($e, 'Category update failed');
        }
        $this->commit();

        return true;
    }

    /**
     * update lang category
     * @param $category
     * @param $request
     * @return bool
     * @throws Exception
     */
    public function updateLangCategory($category, $request)
    {
        $this->beginTransaction();
        try {
            $category->fill($request->only(['description', 'seo_title', 'seo_description', 'keywords']));
            if (!$category->save()) {
                throw new Exception('Category was not saved');
            }
        } catch (Exception $e) {
            return $this->rollback($e, 'Category update failed');
        }
        $this->commit();

        return true;
    }
}
