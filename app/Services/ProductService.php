<?php

namespace App\Services;

use App\Models\ProductImage;
use Exception;
use Storage;

class ProductService extends BaseService
{

    /**
     * update product
     * @param $product
     * @param $request
     * @return bool
     * @throws Exception
     */
    public function updateProduct($product, $request)
    {
        $this->beginTransaction();
        try {
            $product->fill($request->except('_token'));
            if (!$product->save()) {
                throw new Exception('Product was not saved');
            }
        } catch (Exception $e) {
            return $this->rollback($e, 'Product update failed');
        }
        $this->commit();

        return true;
    }

    /**
     * update product lang
     * @param $productLang
     * @param $request
     * @return bool
     * @throws Exception
     */
    public function updateProductLang($productLang, $request)
    {
        $this->beginTransaction();
        try {
            $productLang->fill($request->only(['description', 'title', 'seo_description', 'keywords']));
            if (!$productLang->save()) {
                throw new Exception('Product lang was not saved');
            }
        } catch (Exception $e) {
            return $this->rollback($e, 'Product lang update failed');
        }
        $this->commit();

        return true;
    }

    /**
     * make image as main
     * @param $product
     * @param $image_id
     * @return bool
     * @throws Exception
     */
    public function setImageMain($product, $image_id)
    {
        $this->beginTransaction();
        try {
            $mainImage = $product->mainImage;
            $mainImage->is_main = 0;
            $mainImage->save();

            $newMain = ProductImage::where('id', $image_id)->where('product_id', $product->id)->firstOrFail();
            $newMain->is_main = 1;
            $newMain->save();
        } catch (Exception $e) {
            return $this->rollback($e, 'Product lang update failed');
        }
        $this->commit();

        return true;
    }

    /**
     * delete image
     * @param $image
     * @return bool
     * @throws Exception
     */
    public function deleteImage($image)
    {
        $this->beginTransaction();
        try {
            Storage::disk('public')->delete($image->url);
            $image->delete();
        } catch (Exception $e) {
            return $this->rollback($e, 'Product lang update failed');
        }
        $this->commit();

        return true;
    }

    /**
     * add image
     * @param $id
     * @param $request
     * @return bool
     * @throws Exception
     */
    public function addImage($id, $request)
    {
        $newImage = new ProductImage();
        $this->beginTransaction();
        try {
            if ($request->hasFile('image')) {
                $path = $request->image->store('img/product/' . $id, 'public');
                $newImage->url = $path;
                $newImage->product_id = $id;
                $newImage->save();
            }
        } catch (Exception $e) {
                return $this->rollback($e, 'Product lang update failed');
        }
        $this->commit();

        return true;
    }
}
