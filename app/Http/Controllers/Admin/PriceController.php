<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Bukashk0zzz\YmlGenerator\Model\Offer\OfferParam;
use Bukashk0zzz\YmlGenerator\Model\Offer\OfferSimple;
use Bukashk0zzz\YmlGenerator\Model\Category;
use Bukashk0zzz\YmlGenerator\Model\Currency;
use Bukashk0zzz\YmlGenerator\Model\ShopInfo;
use Bukashk0zzz\YmlGenerator\Settings;
use Bukashk0zzz\YmlGenerator\Generator;

class PriceController extends Controller
{
    const PRICE_PATH = 'price/AeroshopYMLPrice.xml';

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.price', ['pricePath' => self::PRICE_PATH]);
    }

    /**
     * generate new price
     * @return \Illuminate\Http\RedirectResponse
     */
    public function generate()
    {
        if ($this->generateYML()) {
            return back()->with('success', 'Прайс успешно обновлен');
        } else {
            return back()->with('danger', 'Не удалось обновить прайс');
        }
    }

    /**
     * generate xml
     * @return bool
     */
    private function generateYML()
    {
        $file = public_path(self::PRICE_PATH);

        $settings = (new Settings())
            ->setOutputFile($file)
            ->setEncoding('utf-8')
        ;

        // Creating ShopInfo object (https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#shop)
        $shopInfo = (new ShopInfo())
            ->setName('AeroShop')
            ->setCompany('Интернет магазин AeroShop')
            ->setUrl('http://aeroshop.com.ua')
        ;

        // Creating currencies array (https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#currencies)
        $currencies = [];
        foreach (\App\Models\Currency::all() as $currency) {
            $currencies[] = (new Currency())
                ->setId($currency->code)
                ->setRate($currency->rate);
        }


        // Creating categories array (https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#categories)
        $categories = [];
        foreach (\App\Models\Category::all() as $category) {
            if ($category->parent_id > 0) {
                $categories[] = (new Category())
                    ->setId($category->id)
                    ->setName($category->ru_title)
                    ->setParentId($category->parent_id);
            } else {
                $categories[] = (new Category())
                    ->setId($category->id)
                    ->setName($category->ru_title);
            }
        }

        // Creating offers array (https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#offers)
        $offers = [];
        foreach (Product::where('availability_id', '<>', 5)->get() as $product) {
            $offer = (new OfferSimple())
                ->setId($product->id)
                ->setAvailable(true)
                ->setUrl(url('item/' . $product->url))
                ->setPrice($product->price)
                ->setCurrencyId($product->currency)
                ->setCategoryId($product->category_id)
                ->setDelivery(true)
                ->setPickup(true)
                ->setName($product->ru_title)
                ->setDescription('<![CDATA[' .
                    preg_replace(
                        "/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",
                        '<$1$2>',
                        strip_tags($product->lang->description, '<p><b><strong><h2><h3><h4>')
                    )
                    . ']]>');
            foreach ($product->images as $image) {
                $offer->addPicture(url($image->url));
            }
            if ($product->brand_id) {
                $offer->setVendor($product->brand->title);
                $offer->setVendorCode($product->code);
            }
            if ($product->country_id) {
                $offer->setCountryOfOrigin($product->country->ru_title);
            }
            foreach ($product->properties as $property) {
                $param = new OfferParam();
                $param->setName($property->key->ru_title);
                if ($property->ru_value) {
                    $param->setValue($property->ru_value);
                }
                if ($property->unit_id) {
                    $param->setUnit($property->unit->ru_title);
                }
                $offer->addParam($param);
            }
            $offers[] = $offer;
        }

        $yml = (new Generator($settings))->generate(
            $shopInfo,
            $currencies,
            $categories,
            $offers
        );

        return $yml;
    }
}
