<?php

namespace App\Services;

use Exception;

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
                //toDo store image
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
