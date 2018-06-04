<?php

namespace App\Services;

use Exception;

class PageLangService extends BaseService
{

    /**
     * update page
     * @param $page
     * @param $request
     * @return bool
     * @throws Exception
     */
    public function updatePage($page, $request)
    {
        $this->beginTransaction();
        try {
            $page->fill($request->only(['title', 'description', 'seo_title', 'seo_description', 'keywords']));
            if (!$page->save()) {
                throw new Exception('Page was not saved');
            }
        } catch (Exception $e) {
            return $this->rollback($e, 'Page create failed');
        }
        $this->commit();

        return true;
    }
}
