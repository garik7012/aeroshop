<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductPageLang;
use App\Models\ProductLangProperty;

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
        $units = array ( 1 => 'шт.', 2 => 'набор', 3 => 'день', 4 => 'услуга');
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
           //     $this->productLangPropertiesSeed($newProduct->id, $product);
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
}
