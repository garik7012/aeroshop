<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductPageLang;
use App\Models\ProductLangProperty;
use App\Models\Unit;
use App\Models\ProductPropertyKey;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = $this->getProducts();
        $units = Unit::all()->pluck('ru_title', 'id')->toArray();
        $countries = [1 => 'США', 2 => 'Китай', 3 => 'Украина', 4 => 'Германия', 5 => 'Россия', 6 => 'Тайвань', 7 => 'Италия', 8 => 'Япония'];

        foreach ($products as $product) {
            $url = (substr($product[34], 24, -5));
            if (!Product::where('url', $url)->first()) {
                $newProduct = new Product();
                $newProduct->code = $product[0];
                $newProduct->url = $url;
                $newProduct->ru_title = $product[1];
                $newProduct->en_title = $product[1];
                $newProduct->uk_title = $product[1];
                $newProduct->images = str_replace('https://images.ua.prom.st', '/old_img', $product[11]);
                $newProduct->price = $product[5];
                $newProduct->currency = $product[6];
                $newProduct->brand_id = @Brand::where('title', $product[24])->first()->id;
                $newProduct->category_id = Category::where('old_number', $product[14])->first()->id;
                $newProduct->country_id = array_search($product[26], $countries) ?: 0;
                $newProduct->unit_id = array_search($product[7], $units);
                $newProduct->availability_id = $this->getProductAvailabilityId($product[12]);
                $newProduct->save();

                $this->productPageLangSeed($newProduct->id, $product);
                $this->productLangPropertiesSeed($newProduct->id, $product, $units);
            }

        }
    }

    /**
     * page seo and description lang seed
     * @param $id
     * @param $product
     */
    protected function productPageLangSeed($id, $product)
    {
        foreach (['en', 'uk', 'ru'] as $locale) {
            $productPageLang = new ProductPageLang();
            $productPageLang->product_id = $id;
            $productPageLang->locale = $locale;
            $productPageLang->keywords = $product[2];
            $productPageLang->description = $product[3];
            $productPageLang->save();
        }
    }

    /**
     * product properties. in our data they start from 35 index.
     * @param $id
     * @param $product
     */
    protected function productLangPropertiesSeed($id, $product, $units)
    {
        $productKeys = ProductPropertyKey::all()->pluck('ru_title', 'id')->toArray();
        $transValues = $this->getValues();
        for ($i = 35; $i < 93; $i += 3) {
            if (!$product[$i]) {
                break;
            }

            $productProperty = new ProductLangProperty();
            $productProperty->product_id = $id;
            $productProperty->key_id = array_search(
                str_replace('ё', 'е', mb_strtolower($product[$i])),
                array_map('mb_strtolower', $productKeys)
            );
            $productProperty->ru_value = $product[$i+2];
            $productProperty->en_value = $product[$i+2];
            $productProperty->uk_value = $product[$i+2];
            if (isset($transValues[$product[$i+2]])) {
                $productProperty->en_value = $transValues[$product[$i+2]]['en'];
                $productProperty->uk_value = $transValues[$product[$i+2]]['uk'];
            }
            $productProperty->unit_id = array_search($product[$i+1], $units) ?: '';
            $productProperty->save();
        }
    }

    /**
     * Product availability. 2 - not available
     * @param $oldValue
     * @return int
     */
    protected function getProductAvailabilityId($oldValue)
    {
        $id = 1;
        if ($oldValue === '-' or $oldValue === 0) {
            $id = 2;
        }

        return $id;
    }
    /**
     * get product from file or example products
     * @return array|mixed
     */
    protected function getProducts()
    {
        $products = @include('products.php');
        if ($products) {
            return $products;
        }

        return [
            ["003","Краски для аэрографии Auto-Air Color Candy Set B","аэрография, краски для аэрографии, аэрограф, Пневматические краскопульты, Воздушные компрессоры бытовые","<h2>краски для аэрографии Auto-Air Color Candy Set B&nbsp; имеют Эффект Леденца.Эффект &laquo;леденца&raquo;&nbsp; появляется после&nbsp; покрытия&nbsp;&nbsp;&nbsp; лаком.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>\n\n<p>Набор содержит 4 цвета и 2 разбавителя по 120 мл каждый:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\n\n<p>1 x 4603 Orange (Оранжевый )</p>\n\n<p>1 x 4606 Black Cherry (черная вишня)</p>\n\n<p>1 x 4612 Purple (Пурпурный )</p>\n\n<p>1 x 4615&nbsp; Black (Черный)</p>\n\n<p>2 x 4012 High Performance Reducer( разбавитель )</p>\n","r",1369,"UAH","шт.","","","","https://images.ua.prom.st/89769602_w640_h640_candy_set_b.jpg, https://images.ua.prom.st/89769607_w640_h640_candy_set_b1.jpg","-","",4425050,"Наборы Auto Air Color","https://prom.ua/Avtomobilnye-kraski","","","",40283288,"",81103,"","","","США","","","","","","","","https://spektr-v.com.ua/p40283288-kraski-dlya-aerografii.html","Форма выпуска","","Банка","Объем","мл","120.0","Код краски","","003","Тип","","Краска","вид","","водорастворимые|нетоксичны","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""  ],
            ["009","Краски для аэрографии Auto-Air Color Transparent Set","аэрография, краски для аэрографии, аэрограф, купить краски для аэрографии, краска для аэрографии на авто","<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:699px;\" width=\"699\">\n<tbody>\n<tr>\n<td style=\"width:331px;\">\n<h2>Краски для аэрографии Auto-Air Color Transparent Set. (прозрачные).</h2>\n\n<p>Цветная краска для создания росписи, теней и графики поверх основного цвета.Серия 4200.Набор состоит из 7 цветов и 1 разбавителя по 120 мл каждый:<br />\n<br />\n1 x Auto-Air Transparent White(белый)<br />\n1 x Auto-Air Transparent Orange(оранжевый)<br />\n1 x Auto-Air Transparent Fire Red(огненно-красный)<br />\n1 x Auto-Air Transparent Apple Green(яблочно-зеленый)<br />\n1 x Auto-Air Transparent Yellow(желтый)<br />\n1 x Auto-Air Transparent Blue(синий)<br />\n1 x Auto-Air Transparent Black(черный)<br />\n1 x Auto-Air 4011 Flash Reducer(разбавитель)<br />\nПроизводство: &quot;Auto Air Colors&quot; США&nbsp;</p>\n\n<p>&nbsp;</p>\n</td>\n</tr>\n</tbody>\n</table>\n","r",2232,"UAH","шт.","","","","https://images.ua.prom.st/89937215_w640_h640_transparent_set.jpg, https://images.ua.prom.st/89937222_w640_h640_transparent_set1.jpg","-","",4425050,"Наборы Auto Air Color","https://prom.ua/Avtomobilnye-kraski","","","",40340861,"",81103,"","","","США","","","","","","","","https://spektr-v.com.ua/p40340861-kraski-dlya-aerografii.html","Форма выпуска","","Банка","Код краски","","009","Тип","","Краска","Объем","мл","120.0","вид","","водорастворимые|нетоксичны","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""  ],
            ["017","Краски для аэрографии Wicked  / Fluorescent Set.","аэрография, краски для аэрографии, аэрограф, краски для аэрографии купить украина, краска для аэрографии магазин","<h2>Краски для аэрографии Wicked&nbsp; / Fluorescent Set.( Флуоресцентные) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span style=\"line-height: 1.6em;\">Неоновые краски, которые излучают сияние.</span></h2>\n\n<p><span style=\"line-height: 1.6em;\">Набор состоит из 6 цветов по 60 мл каждый:</span></p>\n\n<p>- Wicked Flourescent Purple(Флуоресцентный фиолетовый)</p>\n\n<p>- Wicked Flourescent Raspberry( Флуоресцентный малиновый)</p>\n\n<p>- Wicked Flourescent Orange(Флуоресцентный оранжевый)</p>\n\n<p>- Wicked Flourescent Green(Флуоресцентный зеленый)</p>\n\n<p>- Wicked Flourescent Yellow(Флуоресцентный желтый)</p>\n\n<p>- Wicked Flourescent Pink(Флуоресцентный розовый)</p>\n\n<p>Производство: Createx (США)</p>","r",1181,"UAH","шт.","","","","https://images.ua.prom.st/89951310_w640_h640_wicked_fluorescent_set.jpg","-","",4428994,"Наборы Wicked Colors","https://prom.ua/Avtomobilnye-kraski","","","",40344191,"",81103,"","","","США","","","","","","","","https://spektr-v.com.ua/p40344191-kraski-dlya-aerografii.html","Форма выпуска","","Банка","Код краски","","017","Тип","","Краска","Объем","мл","60.0","вид","","водорастворимые|нетоксичны","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""  ],
            ["019","Краски для аэрографии Wicked / Sampler Set.","аэрография, краски для аэрографии, аэрограф, краска для аэрографии магазин, набор красок для аэрографии купить","<h2>Краски для аэрографии Wicked / Sampler Set.</h2>\n\n<p><br />\nWICKED COLORS - краски по любой поверхности. Обеспечивают свободное распыление не засыхая на игле.Краски Wicked - обеспечивают сверхвысокую производительность, рисование аэрографом можно проводить на любой поверхности: от тканей до автомобилей. Краски Wicked идеально подходят для футболок, автомобильной графики, иллюстраций и большинства других областей применения. Wicked содержит умеренное количество растворителя, смешанного с качественным полимером и автомобильными пигментами для наиболее качественного окрашивания, которое выдерживает прямое, продолжительное воздействие окружающей среды без смывания или потери цвета.Краски Wicked обладают исключительной текучестью и распыляемостью прямо из бутылки и с аэрографами с различными размерами сопел. Набор состоит из 7 цветов и разбавителя по 60 мл каждый:<br />\n- Wicked White(белый)<br />\n- Wicked Black(черный)<br />\n- Wicked Red(красный)<br />\n- Wicked Golden Yellow(Золотисто-желтый)<br />\n- Wicked Blue(синий)<br />\n- Wicked Pthalo Green(Зеленый фталоцианин)<br />\n- Wicked Violet(фиолетовый)<br />\n- Wicked Reducer(разбавитель)<br />\nПроизводство: Createx (США)</p>\n","r",1509,"UAH","шт.","","","","https://images.ua.prom.st/89951924_w640_h640_wicked_sampler_set.jpg","-","",4428994,"Наборы Wicked Colors","https://prom.ua/Avtomobilnye-kraski","","","",40344603,"",81103,"","","","США","","","","","","","","https://spektr-v.com.ua/p40344603-kraski-dlya-aerografii.html","Форма выпуска","","Банка","Код краски","","019","Тип","","Краска","Объем","мл","60.0","вид","","водорастворимые|нетоксичны","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""  ],
            ["022","Auto-Air Colors Sealer Dark - темный грунт-подложка. Серия 4002.","аэрография, краски для аэрографии, аэрограф, купить краски для аэрографии, краска для аэрографии +на авто","<p><iframe frameborder=\"0\" height=\"340\" src=\"//www.youtube.com/embed/BoUFfri4_FU?rel=0&amp;wmode=transparent\" width=\"560\"></iframe></p>\n\n<h2>Auto-Air Colors Sealer Dark - темный грунт-подложка. Серия 4002.</h2>\n\n<p><br />\nНаносится в виде начального слоя на подготовленную поверхность.<br />\nЁмкость - 120 мл.<br />\nПроизводство: Auto-Air Colors (США).</p>\n","r",320,"UAH","шт.","","","","https://images.ua.prom.st/89953613_w640_h640_autoair_colors_sealer_dark.jpg","-","",4730230,"Auto Air добавки и грунт-подложки","https://prom.ua/Avtomobilnye-kraski","","","",40345806,"",81103,"","","","США","","","","","","","","https://spektr-v.com.ua/p40345806-auto-air-colors.html","Форма выпуска","","Банка","Код краски","","022","Тип","","Грунтовка","Объем","мл","120.0","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""  ],
            ["4601","Краски для аэрографии Auto Air Colors 4601Series Candy Pigment-Yellow","краски для аэрографии, аэрография, аэрограф, краски для аэрографии купить украина, краска для аэрографии магазин","<p><iframe frameborder=\"0\" height=\"340\" src=\"//www.youtube.com/embed/dgtf9OVdasU?rel=0&amp;wmode=transparent\" width=\"560\"></iframe></p>\n\n<h3>Краски для аэрографии Auto Air Colors 4601 Series Candy Pigment -<span style=\"font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: normal;\">Yellow (желтый)-120 мл.</span></h3>\n\n<p>Концентрированная &ndash; требуется развести в пропорции 3:1 4011 Flash разбавителем .</p>\n\n<p>Candy-Pigment &ndash; прозрачные краски, используемые для покрытия вторым слоем поверх серий красок 4100 или 4300. Пигментная краска, дающая прозрачные цвета, не содержащая красителей (за исключением 4604 Brite Red), минимизирует потеки.&nbsp;</p>\n\n<p>Эффект &laquo;леденца&raquo; замечается после верхнего слоя, и применения глянцевого лака. Добавьте 4501 Hot Rod sparkle White в любую краску Candy - Pigment и получите &nbsp;ярко-перламутровый леденцовый цвет.</p>\n\n<p>При засыхании краски образуют матовое покрытие; эффект леденца проявляется после лакировки.</p>\n\n<p>Краскопульт : диаметр сопла 1.0мм &ndash; 1.2мм.</p>\n\n<p>Аэрограф: диаметр сопла&nbsp;0.5мм</p>\n\n<p>Наносится многократными легкими слоями, требуется 5-6 слоев для полного покрытия.  После полного высыхания, покройте сверху катализированным, уретановым лаком.</p>\n\n<p>&nbsp;</p>\n","r",274,"UAH","шт.","","","","https://images.ua.prom.st/95267708_w640_h640_4601_yellow.jpg","+","",4424893,"Candy Pigment","https://prom.ua/Avtomobilnye-kraski","","","",43202278,"",81103,"","","","США","","","","","","","","https://spektr-v.com.ua/p43202278-kraski-dlya-aerografii.html","Форма выпуска","","Банка","Тип","","Краска","Код краски","","4601","Объем","мл","120.0","Цвет","","Желтый","вид","","водорастворимые|нетоксичны","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""  ],
            ["4606","Краски для аэрографии Auto Air Colors 4606 Series Candy Pigment- Black Cherry","краски для аэрографии, аэрография, аэрограф, купить краски для аэрографии, какие краски для аэрографии","<p><iframe frameborder=\"0\" height=\"340\" src=\"//www.youtube.com/embed/1Cxz6s2IJpQ?rel=0&amp;wmode=transparent\" width=\"560\"></iframe></p>\n\n<h3>Краски для аэрографии Auto Air Colors 4606 Series Candy Pigment- <span style=\"font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: normal;\">&nbsp;Black Cherry&nbsp;(черная вишня)-120 мл.</span></h3>\n\n<p>&nbsp;</p>\n\n<p>Концентрированная &ndash; требуется развести в пропорции 3:1 4011 Flash разбавителем .</p>\n\n<p>Candy-Pigment &ndash; прозрачные краски, используемые для покрытия вторым слоем поверх серий красок 4100 или 4300. Пигментная краска, дающая прозрачные цвета, не содержащая красителей (за исключением 4604 Brite Red), минимизирует потеки.&nbsp;</p>\n\n<p>Эффект &laquo;леденца&raquo; замечается после верхнего слоя, и применения глянцевого лака. Добавьте 4501 Hot Rod sparkle White в любую краску Candy - Pigment и получите &nbsp;ярко-перламутровый леденцовый цвет.</p>\n\n<p>При засыхании краски образуют матовое покрытие; эффект леденца проявляется после лакировки.</p>\n\n<p>Краскопульт : диаметр сопла 1.0мм &ndash; 1.2мм.</p>\n\n<p>Аэрограф: диаметр сопла 0.5мм</p>\n\n<p>Наносится многократными легкими слоями, требуется 5-6 слоев для полного покрытия.  После полного высыхания, покройте сверху катализированным, уретановым лаком.</p>\n\n<p>&nbsp;</p>\n","r",274,"UAH","шт.","","","","https://images.ua.prom.st/95570837_w640_h640_4606_black_cherry.jpg","-","",4424893,"Candy Pigment","https://prom.ua/Avtomobilnye-kraski","","","",43323572,"",81103,"","","","США","","","","","","","","https://spektr-v.com.ua/p43323572-kraski-dlya-aerografii.html","Форма выпуска","","Банка","Объем","мл","120.0","Код краски","","4606","Тип","","Краска","цвет","","черная вишня","вид","","водорастворимые|нетоксичны","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""  ],
            ["4609","Краски для аэрографии Auto Air Colors 4609 Series Candy Pigment-  Emerald Green","краски для аэрографии, аэрография, аэрограф, купить краски для аэрографии, какие краски для аэрографии","<p><iframe frameborder=\"0\" height=\"340\" src=\"//www.youtube.com/embed/kQELNdkRpG8?rel=0&amp;wmode=transparent\" width=\"560\"></iframe></p>\n\n<h3>Краски для аэрографии Auto Air Colors 4609 Series Candy Pigment- <span style=\"font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: normal;\">&nbsp;Emerald Green&nbsp;(</span>изумрудно-зеленый<span style=\"font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: normal;\">)-120 мл.</span></h3>\n\n<p>&nbsp;</p>\n\n<p>Концентрированная &ndash; требуется развести в пропорции 3:1 4011 Flash разбавителем .</p>\n\n<p>Candy-Pigment &ndash; прозрачные краски, используемые для покрытия вторым слоем поверх серий красок 4100 или 4300. Пигментная краска, дающая прозрачные цвета, не содержащая красителей (за исключением 4604 Brite Red), минимизирует потеки.&nbsp;</p>\n\n<p>Эффект &laquo;леденца&raquo; замечается после верхнего слоя, и применения глянцевого лака. Добавьте 4501 Hot Rod sparkle White в любую краску Candy - Pigment и получите &nbsp;ярко-перламутровый леденцовый цвет.</p>\n\n<p>При засыхании краски образуют матовое покрытие; эффект леденца проявляется после лакировки.</p>\n\n<p>Краскопульт : диаметр сопла 1.0мм &ndash; 1.2мм.</p>\n\n<p>Аэрограф: диаметр сопла 0.5мм</p>\n\n<p>Наносится многократными легкими слоями, требуется 5-6 слоев для полного покрытия.  После полного высыхания, покройте сверху катализированным, уретановым лаком.</p>\n\n<p>&nbsp;</p>\n","r",274,"UAH","шт.","","","","https://images.ua.prom.st/95575614_w640_h640_4609_emerald_green.jpg","+","",4424893,"Candy Pigment","https://prom.ua/Avtomobilnye-kraski","","","",43324532,"",81103,"","","","США","","","","","","","","https://spektr-v.com.ua/p43324532-kraski-dlya-aerografii.html","Форма выпуска","","Банка","Объем","мл","120.0","Код краски","","4609","Тип","","Краска","цвет","","изумрудно-зеленый","вид","","водорастворимые|нетоксичны","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""  ],
            ["4611","Краски для аэрографии Auto Air Colors 4611 Series Candy Pigment-  Magenta","краски для аэрографии, аэрография, аэрограф, купить краски для аэрографии, какие краски для аэрографии","<p><iframe frameborder=\"0\" height=\"340\" src=\"//www.youtube.com/embed/H2GkMYFOAR8?rel=0&amp;wmode=transparent\" width=\"560\"></iframe></p>\n\n<h3>Краски для аэрографии Auto Air Colors 4611 Series Candy Pigment- <span style=\"font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: normal;\">Magenta&nbsp;(пурпурный)-120 мл.</span></h3>\n\n<p>&nbsp;</p>\n\n<p>Концентрированная &ndash; требуется развести в пропорции 3:1 4011 Flash разбавителем .</p>\n\n<p>Candy-Pigment &ndash; прозрачные краски, используемые для покрытия вторым слоем поверх серий красок 4100 или 4300. Пигментная краска, дающая прозрачные цвета, не содержащая красителей (за исключением 4604 Brite Red), минимизирует потеки.&nbsp;</p>\n\n<p>Эффект &laquo;леденца&raquo; замечается после верхнего слоя, и применения глянцевого лака. Добавьте 4501 Hot Rod sparkle White в любую краску Candy - Pigment и получите &nbsp;ярко-перламутровый леденцовый цвет.</p>\n\n<p>При засыхании краски образуют матовое покрытие; эффект леденца проявляется после лакировки.</p>\n\n<p>Краскопульт : диаметр сопла 1.0мм &ndash; 1.2мм.</p>\n\n<p>Аэрограф: диаметр сопла 0.5мм</p>\n\n<p>Наносится многократными легкими слоями, требуется 5-6 слоев для полного покрытия.  После полного высыхания, покройте сверху катализированным, уретановым лаком.</p>\n\n<p>&nbsp;</p>\n","r",274,"UAH","шт.","","","","https://images.ua.prom.st/95577641_w640_h640_4611_magenta.jpg","-","",4424893,"Candy Pigment","https://prom.ua/Avtomobilnye-kraski","","","",43324656,"",81103,"","","","США","","","","","","","","https://spektr-v.com.ua/p43324656-kraski-dlya-aerografii.html","Форма выпуска","","Банка","Объем","мл","120.0","Код краски","","4611","Тип","","Краска","цвет","","пурпурный","вид","","водорастворимые|нетоксичны","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""  ],
        ];
    }

    /**
     * some translated values
     * @return array
     */
    public function getValues()
    {
        return [
            "Банка" => ['en' => 'Can', 'uk' =>'Банка'],
            "Краска" => ['en' => 'Paint', 'uk' =>'фарба'],
            "водорастворимые|нетоксичны" => ['en' => 'water-soluble | non-toxic', 'uk' =>'водорозчинні | нетоксичні'],
            "Грунтовка" => ['en' => 'Primer', 'uk' => 'Грунтовка'],
            "Желтый" => ['en' => 'Yellow', 'uk' => 'жовтий'],
            "черная вишня" => ['en' => 'black cherry', 'uk' => 'чорна вишня'],
            "изумрудно-зеленый" => ['en' => 'emerald green', 'uk' => 'смарагдово-зелений'],
            "пурпурный" => ['en' => 'purple', 'uk' => 'пурпурний'],
            "Фиолетовый" => ['en' => 'violet', 'uk' => 'фіолетовий'],
            "мускатный" => ['en' => 'muscat', 'uk' => 'мускатний'],
            "Черный" => ['en' => 'black', 'uk' => 'чорний'],
            "солнечно-золотой" => ['en' => 'sunny gold', 'uk' => 'сонячно-золотий'],
            "Оранжевый" => ['en' => 'Orange', 'uk' => 'помаранчевий'],
            "огненно-красный" => ['en' => 'fiery red', 'uk' => 'вогненно-червоний'],
            "дорожный красный" => ['en' => 'road red', 'uk' => 'дорожній червоний'],
            "вишнево-красный" => ['en' => 'cherry red', 'uk' => 'вишнево-червоний'],
            "яблочно-зеленый" => ['en' => 'apple-green', 'uk' => 'яблучно-зелений'],
            "Синий" => ['en' => 'Blue', 'uk' => 'синій'],
            "морской синий" => ['en' => 'sea blue', 'uk' => 'морський синій'],
            "Малиновый" => ['en' => 'Crimson', 'uk' => 'малиновий'],
            "красно-фиолетовый" => ['en' => 'red-violet', 'uk' => 'червоно-фіолетовий'],
            "Бежевый" => ['en' => 'Beige', 'uk' => 'бежевий'],
            "кобальт синий" => ['en' => 'cobalt blue', 'uk' => 'кобальт синій'],
            "черный дым" => ['en' => 'black smoke', 'uk' => 'чорний дим'],
            "нефритовый" => ['en' => 'jade', 'uk' => 'нефритовий'],
            "бирюзово-голубой" => ['en' => 'turquoise-blue', 'uk' => 'бирюзово-блакитний'],
            "сине-фиолетовый" => ['en' => 'blue-violet', 'uk' => 'синьо-фіолетовий'],
            "Розовый" => ['en' => 'Pink', 'uk' => 'рожевий'],
            "Лимонный" => ['en' => 'Citric', 'uk' => 'лимонний'],
            "огненно-желтый" => ['en' => 'fiery yellow', 'uk' => 'вогненно-жовтий'],
            "хромированный желтый" => ['en' => 'chrome yellow', 'uk' => 'хромований жовтий'],
            "огненно оранжевый" => ['en' => 'fiery orange', 'uk' => 'вогненно помаранчевий'],
            "огненно красный" => ['en' => 'fiery red', 'uk' => 'вогненно червоний'],
            "насыщенный зеленый" => ['en' => 'saturated green', 'uk' => 'насичений зелений'],
            "аква" => ['en' => 'aqua', 'uk' => 'аква'],
            "карибский синий" => ['en' => 'caribbean blue', 'uk' => 'карибський синій'],
            "Голубой" => ['en' => 'Blue', 'uk' => 'блакитний'],
            "темно-синий" => ['en' => 'dark blue', 'uk' => 'темно синій'],
            "фуксия" => ['en' => 'fuchsia', 'uk' => 'фуксія'],
            "насыщенный пурпурный" => ['en' => 'rich magenta', 'uk' => 'насичений пурпурний'],
            "насыщенный черный" => ['en' => 'rich black', 'uk' => 'насичений чорний'],
            "Красный" => ['en' => 'Red', 'uk' => 'червоний'],
            "насыщенный синий" => ['en' => 'deep blue', 'uk' => 'насичений синій'],
            "зеленый фталоцианин" => ['en' => 'green phthalocyanine', 'uk' =>'зелений фталоцианин'],
            "золотисто-желтый" => ['en' => 'golden yellow', 'uk' =>'золотисто-жовтий'],
            "красный оксид" => ['en' => 'red oxide', 'uk' =>'червоний оксид'],
            "голубая лагуна" => ['en' => "blue Lagoon", 'uk' =>"блакитна лагуна"],
            "Белый" => ['en' => "White", 'uk' => "Білий"],
            "солнечные лучи" => ['en' => "Sun rays", 'uk' =>"сонячні промені"],
            "Алый" => ['en' => "Scarlet", 'uk' => "Червоний"],
            "красный фиолетовый" => ['en' => "red purple", 'uk' =>"Червоний фіолетовий"],
            "виридиан" => ['en' => "viridian", 'uk' => "Вірідіан"],
            "умбра жженая" => ['en' => "umbra burnt", 'uk' =>"Умбра палена"],
            "жженая сиена" => ['en' => "burnt sienna", 'uk' =>"Палена Сієна"],
            "зеленый мох" => ['en' => "green moss", 'uk' =>"Зелений мох"],
            "Внутренний" => ['en' => "Interior", 'uk' => "Внутрішній"],
            "Аэрограф" => ['en' => "Airbrush", 'uk' => "Аерограф"],
            "резьбовое" => ['en' => "threaded", 'uk' => "Різьбове"],
            "да" => ['en' => "Yes", 'uk' => "Так"],
            "1-3,5 кг/см²" => ['en' => "1-3.5 kg / cm²", 'uk' =>"1-3,5 кг / см²"],
            "7 мл" => ['en' => "7 ml", 'uk' =>"7 мл"],
            "нет" => ['en' => "no", 'uk' => "Немає"],
            "верхняя" => ['en' => "upper", 'uk' => "Верхня"],
            "двойное|независимое" => ['en' => "double | independent", 'uk' =>"Подвійне | незалежне"],
            "Двойного действия" => ['en' => "Double action", 'uk' =>"Подвійного дії"],
            "Верхняя подводка материала" => ['en' => "Upper material lining", 'uk' =>"Верхня підводка матеріалу"],
            "Конический фиксируемый самоцентрический" => ['en' => "Conical fixed self-centering", 'uk' =>"Конічний фіксується самоцентріческій"],
            "Предварительная настройка подачи материала" => ['en' => "Preset Feed Setting", 'uk' =>"Попереднє налаштування подачі матеріалу"],
            "конусное" => ['en' => "conical", 'uk' => "Конусное"],
            "0,35-2,1кг/см²" => ['en' => "0.35-2.1 kg / cm²", 'uk' =>"0,35-2,1кг / см²"],
            "2 мл" => ['en' => "2 ml", 'uk' =>"2 мл"],
            "одинарное" => ['en' => "single", 'uk' => "Одинарне"],
            "Одинарного действия" => ['en' => "Single Action", 'uk' =>"Одинарної дії"],
            "Внешний" => ['en' => "External", 'uk' => "Зовнішній"],
            "Нижняя подводка материала" => ['en' => "Bottom threading material", 'uk' =>"Нижня підводка матеріалу"],
            "Резьбовой фиксируемый" => ['en' => "Threaded fixed", 'uk' =>"Резьбовой фіксується"],
            "наружный" => ['en' => "outer", 'uk' => "Зовнішній"],
            "20 мл" => ['en' => "20 ml", 'uk' =>"20 мл"],
            "нижняя" => ['en' => "lower", 'uk' => "Нижня"],
            "2, 7, 12 мл" => ['en' => "2, 7, 12 ml", 'uk' =>"2, 7, 12 мл"],
            "двойное|зависимое" => ['en' => "double dependent", 'uk' =>"Подвійне | залежне"],
            "2x20 мл" => ['en' => "2x20 ml", 'uk' =>"2x20 мл"],
            "Пластиковый кейс" => ['en' => "Plastic case", 'uk' =>"Пластиковий кейс"],
            "верхняя и нижняя" => ['en' => "upper and lower", 'uk' =>"Верхня і нижня"],
            "22мл" => ['en' => "22ml", 'uk' => "22мл"],
            "0,2мм" => ['en' => "0.2mm", 'uk' =>"0,2"],
            "резьбовая (без уплотнения)" => ['en' => "threaded (without seal)", 'uk' =>"Різьбова (без ущільнення)"],
            "есть" => ['en' => "there is", 'uk' => "Є"],
            "двойное независимое(полуавтомат)" => ['en' => "double independent (semi-automatic)", 'uk' =>"Подвійне незалежне (напівавтомат)"],
            "7мл" => ['en' => "7ml", 'uk' =>"7мл"],
            "Боковое расположение красочной емкости" => ['en' => "Side location of the colorful container", 'uk' =>"Бічне розташування барвистою ємності"],
            "7, 22 мл" => ['en' => "7, 22 ml", 'uk' =>"7, 22 мл"],
            "боковая" => ['en' => "lateral", 'uk' =>"Бічна"],
            "0.35; 0|5мм" => ['en' => "0.35, 0 | 5mm", 'uk' =>"0.35; 0 | 5мм"],
            "1-3|5кг/см2" => ['en' => "1-3 | 5kg / cm2", 'uk' =>"1-3 | 5кг / см2"],
            "1,8м 1/8*1/8" => ['en' => "1.8m 1/8 * 1/8", 'uk' =>"1,8м 1/8 * 1/8"],
            "двойное независимое" => ['en' => "double independent", 'uk' =>"Подвійне незалежне"],
            "2мл|7мл|12мл" => ['en' => "2ml | 7ml | 12ml", 'uk' =>"2 мл | 7мл | 12мл"],
            "1шт" => ['en' => "1 PC", 'uk' =>"1 шт"],
            "Сеть 220В" => ['en' => "Network 220V", 'uk' =>"Мережа 220В"],
            "разбавитель" => ['en' => "diluent", 'uk' =>"Розчинник"],
            "Аксессуары для аэрографа" => ['en' => "Accessories for the airbrush", 'uk' =>"Аксесуари для аерографа"],
            "Набор красок" => ['en' => "Set of colors", 'uk' =>"Набір фарб"],
            "Баночка" => ['en' => "Jar", 'uk' =>"Баночка"],
            "Обычная" => ['en' => "Ordinary", 'uk' =>"Звичайна"],
            "Компрессор для аэрографа" => ['en' => "Compressor for the airbrush", 'uk' =>"Компресор для аерографа"],
            "с прямым приводом" => ['en' => "with direct drive", 'uk' =>"З прямим приводом"],
            "Краска поштучно" => ['en' => "Paint by the piece", 'uk' =>"Фарба поштучно"],
            "перламутровый желтый" => ['en' => "pearl yellow", 'uk' =>"Перламутровий жовтий"],
            "Перламутровая" => ['en' => "Mother-of-pearl", 'uk' =>"Перламутрова"],
            "перламутровый оранжевый" => ['en' => "pearl orange", 'uk' =>"Перламутровий помаранчевий"],
            "перламутровый сливовый" => ['en' => "mother-of-pearl plum", 'uk' =>"Перламутровий сливовий"],
            "сине-зеленый" => ['en' => "blue-green", 'uk' =>"Синьо-зелений"],
            "голубовато-зелёный" => ['en' => "bluish green", 'uk' =>"Блакитно-зелений"],
            "небесно-голубой" => ['en' => "sky blue", 'uk' =>"Небесно-блакитний"],
            "темно-оранжевый" => ['en' => "dark orange", 'uk' =>"Темно-помаранчевий"],
            "натуральная сиена" => ['en' => "natural sienna", 'uk' =>"Натуральна Сієна"],
            "умбра" => ['en' => "umber", 'uk' =>"Умбра"],
            "жжёная умбра" => ['en' => "burnt umber", 'uk' =>"Палена умбра"],
            "сепия" => ['en' => "sepia", 'uk' =>"Сепія"],
            "огненная сиенна" => ['en' => "fiery sienna", 'uk' =>"Вогненна Сієну"],
            "Ограничитель подачи материала" => ['en' => "Feed restrictor", 'uk' =>"Обмежувач подачі матеріалу"],
            "Плавающий самоцентрирующийся" => ['en' => "Floating self-centering", 'uk' =>"Плаваючий самоцентруючийся"],
            "Мономер, акриловая жидкость" => ['en' => "Monomer, acrylic liquid", 'uk' =>"Мономер, акрилова рідина"],
            "Художественные краски" => ['en' => "Artistic paints", 'uk' =>"Мистецькі барви"],
            "Запчасти для аэрографа" => ['en' => "Spare parts for the airbrush", 'uk' =>"Запчастини для аерографа"],
            "Бокорезы" => ['en' => "Side cutters", 'uk' =>"Бокорізи"],
            "есть 1/8*1/8" => ['en' => "there is 1/8 * 1/8", 'uk' =>"Є 1/8 * 1/8"],
            "есть 1/8*1/4" => ['en' => "there is 1/8 * 1/4", 'uk' =>"Є 1/8 * 1/4"],
            "резьбовая(без уплотнения)" => ['en' => "threaded (without seal)", 'uk' =>"Різьбова (без ущільнення)"],
            "есть 0,2 мм" => ['en' => "there is 0.2 mm", 'uk' =>"Є 0,2 мм"],
            "двойное| независимое (полуавтомат)" => ['en' => "double | independent (semi-automatic)", 'uk' =>"Подвійне | незалежне (напівавтомат)"],
            "1-3|5кг/см" => ['en' => "1-3 | 5kg / cm", 'uk' =>"1-3 | 5кг / см"],
            "2 бар" => ['en' => "2 bar", 'uk' =>"2 бар"],
            "Наклейки" => ['en' => "Stickers", 'uk' =>"Наклейки"],
            "Для маникюра|Для педикюра" => ['en' => "For a manicure | For a pedicure", 'uk' =>"Для манікюру | Для педикюру"],
            "комплект" => ['en' => "set", 'uk' =>"Комплект"],
            "1.0 (бар)" => ['en' => "1.0 (bar)", 'uk' =>"1.0 (бар)"],
            "предварительная подача воздуха" => ['en' => "pre-supply of air", 'uk' =>"Попередня подача повітря"],
            "сеть 220 В" => ['en' => "220 V network", 'uk' =>"Мережу 220 В"],
            "255х135х205 мм" => ['en' => "255x135x205 mm", 'uk' =>"255х135х205 мм"],
            "310х135х310 мм" => ['en' => "310x135x310 mm", 'uk' =>"310х135х310 мм"],
            "320х135х310 мм" => ['en' => "320x135x310 mm", 'uk' =>"320х135х310 мм"],
            "20, 40 мл" => ['en' => "20, 40 ml", 'uk' =>"20, 40 мл"],
            "Предварительная настройка подачи материала|Предварительная подача воздуха" => ['en' => "Preset Feed Setting | Pre-Air Delivery", 'uk' =>"Попереднє налаштування подачі матеріалу | Попередня подача повітря"],
            "9 мл" => ['en' => "9 ml", 'uk' =>"9 мл"],
            "7, 12 мл" => ['en' => "7, 12 ml", 'uk' =>"7, 12 мл"],
            "0.4 (мм)" => ['en' => "0.4 (mm)", 'uk' =>"0.4 (мм)"],
            "2мл + 5 мл" => ['en' => "2ml + 5ml", 'uk' =>"2 мл + 5 мл"],
            "0,15мм + 0,4 мм" => ['en' => "0.15mm + 0.4mm", 'uk' =>"0,15 мм + 0,4 мм"],
            "Акриловая краска" => ['en' => "Acrylic paint", 'uk' =>"Акрилова фарба"],
            "Флуоресцентная" => ['en' => "Fluorescent", 'uk' =>"Флуоресцентна"],
            "Профессиональная" => ['en' => "Professional", 'uk' =>"Професійна"],
            "5.5" => ['en' => "5.5", 'uk' =>"5.5"],
            "Безмасляный" => ['en' => "Oil-free", 'uk' =>"Безмасляний"],
            "Трафарет" => ['en' => "Stencil", 'uk' =>"Трафарет"],
            "Многоразовое" => ['en' => "Reusable", 'uk' =>"Багаторазове"],
            "Декоративная лента" => ['en' => "Decorative ribbon", 'uk' =>"Декоративна стрічка"],
            "Передвижной" => ['en' => "Mobile", 'uk' =>"Пересувний"],
            "Одноступенчатый" => ['en' => "Single-stage", 'uk' =>"Одноступінчатій"],
            "Вспомогательная жидкость" => ['en' => "Auxiliary fluid", 'uk' =>"Допоміжна рідина"],
            "Коричневый" => ['en' => "Brown", 'uk' =>"Коричневий"],
            "Зеленый" => ['en' => "Green", 'uk' =>"Зелений"],
            "прозрачный" => ['en' => "transparent", 'uk' =>"Прозорий"],
            "Для маникюра" => ['en' => "For a manicure", 'uk' =>"Для манікюра"],
            "Горизонтально" => ['en' => "Horizontally", 'uk' =>"Горизонтально"],
            "Зависимого действия (автомат)" => ['en' => "Dependent action (machine)", 'uk' =>"Залежність дії (автомат)"],
            "Стационарный" => ['en' => "Stationary", 'uk' =>"Стаціонарний"],
            "Двухступенчатый" => ['en' => "Two-stage", 'uk' =>"Двохступеневий"],
            "Новое" => ['en' => "New", 'uk' =>"Нове"],
            "Одностороннее" => ['en' => "One-sided", 'uk' =>"Одностороннє"],
            "Ограничитель подачи материала|Предварительная настройка подачи материала|Предварительная подача воздуха" => ['en' => "Material feed limit | Material presetting | Preliminary air supply", 'uk' =>"Обмежувач подачі матеріалу | Попереднє налаштування подачі матеріалу | Попередня подача повітря"],
            "Золотистый" => ['en' => "Golden", 'uk' =>"Золотистий"],
            "Акриловая система" => ['en' => "Acrylic System", 'uk' =>"Акрилова система"],
            "Маникюр|Педикюр" => ['en' => "Manicure | Pedicure", 'uk' =>"Манікюр | Педикюр"],
            "Лак-гель|Краска" => ['en' => "Lac-gel | Paint", 'uk' =>"Лак-гель | Фарба"],
            "Нейл арт|Художественная роспись ногтей|Аэрография" => ['en' => "Neil art | Art nails painting | Aerography", 'uk' =>"Нейл арт | Художній розпис нігтів | Аерографія"],
            "Аэрография" => ['en' => "Aerography", 'uk' =>"Аерографія"],
            "Серый" => ['en' => "Gray", 'uk' => "Сірий"],
            "Типсы, формы" => ['en' => "Tipsy, forms", 'uk' => "Тіпси, форми"],
            "7, 20 мл" => ['en' => "7, 20 ml", 'uk' => "7, 20 мл"],
            "Универсальный" => ['en' => "Universal", 'uk' => "Універсальний"],
            "Дневной" => ['en' => "Day", 'uk' => "Денний"],
            "Выдача сертификатов" => ['en' => "Issuance of certificates", 'uk' => "Видача сертифікатів"],
            "Природа, пейзажи" => ['en' => "Nature, landscapes", 'uk' => "Природа, пейзажі"],
            "Ограничитель подачи материала|Предварительная подача воздуха" => ['en' => "Feed restrictor | Pre-supply air", 'uk' => "Обмежувач подачі матеріалу | Попередня подача повітря"],
            "резьбовая (с уплотнением)" => ['en' => "threaded (with seal)", 'uk' => "Різьбова (з ущільненням)"],
            "есть 0,3 мм" => ['en' => "there is 0.3 mm", 'uk' => "Є 0,3 мм"],
            "Набор инструментов" => ['en' => "Set of tools", 'uk' => "Набір інструментів"],
            "Жидкий грим" => ['en' => "Liquid make-up", 'uk' => "Рідкий грим"],
            "светло-зеленый" => ['en' => "light green", 'uk' => "світло зелений"],
            "Краска для татуировки" => ['en' => "Paint for tattoos", 'uk' => "Фарба для татуювання"],
            "Водно-спиртовой (гелевый)" => ['en' => "Water-alcohol (gel)", 'uk' => "Водно-спиртовий (гелевий)"],
            "Пудра для грима" => ['en' => "Powder for makeup", 'uk' => "Пудра для гриму"],
            "Растения, цветы" => ['en' => "Plants, flowers", 'uk' => "Рослини, квіти"],
            "Хаки" => ['en' => "Khaki", 'uk' => "Хакі"],
            "Бирюзовый" => ['en' => "Turquoise", 'uk' => "Бірюзовий"],
        ];
    }
}
