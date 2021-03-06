<?php

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\PageLang;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = $this->getPages();
        foreach ($pages as $page) {
            if (Page::where('url', $page['url'])->count()) {
                continue;
            }
            $newPage = new Page();
            $newPage->url = $page['url'];
            $newPage->save();

            $this->setPageLang($newPage->id, $page);
        }
    }

    protected function setPageLang($id, $page)
    {
        foreach (['ru', 'uk', 'en'] as $locale) {
            $pageLang = new PageLang();
            $pageLang->page_id = $id;
            $pageLang->locale = $locale;
            $pageLang->title = $page['title'];
            $pageLang->description = $page['description'];
            $pageLang->seo_title = $page['seo_title'];
            $pageLang->seo_description = $page['seo_description'];
            $pageLang->keywords = $page['keywords'];
            $pageLang->save();
        }
    }

    protected function getPages()
    {
        return [
            [
                'url' => '/',
                'title' => 'ДОБРО ПОЖАЛОВАТЬ В AEROSHOP!',
                'description' => '<p>В нашем магазине Вы найдете большой ассортимент товаров для <strong>аэрографии</strong>.</p>
                        <p>В данный момент аэрография активно развивается и широко применяется в следующих сферах:
                        <strong>автомобильная аэрография, аэрография на текстиле, художественное оформление интерьеров, аэрография мобильных телефонов, ноутбуков, бытовой техники, роспись керамики и стекла, моделестроение, роспись тела (боди-арт), художественный маникюр, кондитерская аэрография</strong>
                        и др.</p>
                        <p>Для вашего удобства мы разместили товары по группам.</p>
                        <p>Доставка товаров для аэрографии осуществляется по г. Киеву, а также в другие города Украины (подробнее в разделе Доставка и оплата).</p>
                        <p>Если воспользуетесь услугами нашего магазина, то вы станете нашим постоянным клиентом, так как товары высокого качества и хорошее обслуживание не оставят никого равнодушными.</p>
                        <p><strong>Мы поможем Вам сделать жизнь ярче!</strong></p>',
                'seo_title' => 'интернет магазин "AEROSHOP" - все для аэрографии в Украине: аэрографы,компрессоры,краски,оборудование для аэрографии. ',
                'seo_description' => 'Купить  краски  для  аэрографии ,аэрографы ,компрессоры , аксессуары для аэрографии в Киеве и Украине от интернет магазина  "AEROSHOP".',
                'keywords' => 'Createx Colors, краски для аэрографии, водорастворимые краски для аэрографа купить в [Украине], [AeroShop],креатекс колор,Auto Air Colors,Wicked,аэрограф,компрессор для аэрографа,лекала для аэрографии,оборудование для аэрографии.',
            ],
            [
                'url' => 'delivery',
                'title' => 'УСЛОВИЯ ДОСТАВКИ И ОПЛАТЫ',
                'description' => '<div>Доставка осуществляется только по предоплате.
            <div>
                <h4>Способы доставки</h4>
                <ul>
                    <li><b>Самовывоз</b></li>
                    <li><b>Доставка курьером</b></li>
                    <li><b>Доставка почтой</b></li>
                    <li><b>Транспортная компания</b></li>
                    <li><b>Нова Пошта</b></li>
                    <li><b>Почтоматы Приватбанка</b></li>
                </ul>
            </div>
            <div>
                <h4>Способы оплаты</h4>
                <ul>
                    <li><b>Наличными</b></li>
                    <li><b>Безналичный расчет</b></li>
                    <li><b>Наложенный платеж</b></li>
                    <li><b>приват 24</b></li>
                </ul>
            </div>
            <div title="Дополнительная информация о доставке и оплате:">
                <div>
                    <div>
                        <h4 style="text-align:center"><strong>Оплата и Доставка</strong></h4>
                        <p>&nbsp; &nbsp; При оформлении заказа в магазине в качестве подтверждения заказа на
                            электронную почту Вам приходит сообщение с информацией о Вашем заказе. После оформления
                            заказа Вам перезвонит менеджер&nbsp;и уточнит способ доставки и оплаты и при необходимости
                            проконсультирует Вас.<br> Заказы без указания контактного номера телефона не обслуживаются.
                        </p>
                        <p><br> &nbsp; &nbsp; Доставка осуществляется в любой населенный пункт страны, где есть
                            отделение связи Укрпочты или представительства Новой почты. В качестве адреса доставки
                            необходимо указывать: при пересылке УкрПочтой - домашний адрес, без сокращений (например:
                            "02000 г.Киев, ул. Фруктовая, 13, кв. 48") или адрес склада при пересылке Новой почтой.</p>
                        <p>Способ доставки по Украине (УкрПочта или Новая почта) обязательно указывать в комментариях
                            при заполнении бланка заказа.<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Оплата производится
                            <strong>наложенным платежом</strong>&nbsp; в гривнях - при получении посылки Вы оплачиваете
                            указанную в документах на посылку сумму. В эту сумму включена стоимость заказанного товара +
                            расходы по пересылке заказа. Дополнительно при получении посылки взимается оплата за
                            денежный перевод (примерно 2-5% от полной, с учетом пересылки, стоимости заказа).<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Также Вы можете оплатить свой заказ путём <strong>перечисления денег на расчетный счет или
                                на&nbsp;карту&nbsp;ПриватБанка</strong>&nbsp;после формирования Вашего заказа и при
                            получении посылки оплатить только стоимость пересылки.&nbsp;&nbsp;Реквизиты&nbsp;на оплату
                            заказа Вам вышлет менеджер только после формирования заказа.&nbsp;Срок доставки товара может
                            варьироваться от 1 до 3 рабочих дней.&nbsp;</p>
                        <h4 style="text-align:center"><strong>УкрПочта</strong></h4>
                        <p>Доставка<strong> УкрПочтой осуществляется <u>один раз в неделю</u></strong><u>&nbsp;</u>-&nbsp;
                            оплата производится <strong>наложенным платежом</strong> или <strong>предоплата на расчетный
                                счет</strong>.</p>
                        <p>&nbsp;<u><strong>УкрПочта Предоплата.</strong></u><br> Стоимость пересылки УкрПочтой в
                            крупные населенные пункты от 20 грн., в небольшие населенные пункты (села, поселки) от 35
                            грн.<br> &nbsp;<u><strong>УкрПочта Наложенный платеж.</strong></u><br> Стоимость пересылки
                            заказа с наложенным платежом УкрПочтой в Ваш город приблизительно 25-30 грн. Чем больше
                            сумма заказа (а соответственно оценка посылки) и вес посылки, тем дороже ее пересылка.<br>
                            &nbsp;</p>
                        <h4 style="text-align:center"><strong>НОВАЯ ПОЧТА</strong></h4>
                        <p>Доставка Новой Почтой&nbsp;<strong>осуществляется&nbsp;<u>каждый день (пн-пт)</u></strong> -&nbsp;
                            оплата производится <strong>наложенным платежом</strong> или <strong>предоплата на расчетный
                                счет</strong>.<br> &nbsp;&nbsp;</p>
                        <p><u><strong>Новая почта Предоплата.</strong></u><br> Стоимость пересылки Новой почтой в Ваш
                            город - от 35 грн., по Киеву - от 20 грн.&nbsp;</p>
                        <p><em><strong>Отличная новость от Новой почты для жителей г.Киев: при отправке заказа до 12:00,
                                    вы сможете получить ваш заказ уже вечером в этот же день.&nbsp;</strong></em></p>
                        <p><strong><u>Новая почта Наложенный платеж.</u></strong></p>
                        <p>Стоимость пересылки заказа Новой почтой в Ваш город (от 35 грн) + комиссия за перевод денег
                            согласно тарифов Новой Почты (21 грн + 2% от суммы заказа), общая сумма получится от 56
                            грн<br> &nbsp;</p>
                        <h4 style="text-align:center"><strong>Курьером по Киеву</strong></h4>
                        <p>&nbsp; Доставка товара курьером осуществляется в пределах Киева.&nbsp;<br> &nbsp; Доставка
                            может производится как к Вам домой, так и по месту работы. В телефонном режим менеджер
                            уточнит всю информацию об адресе и времени доставки. Вся информация, оставляемая Вами,
                            является конфиденциальной и не будет использоваться нами, кроме как для доставки заказанных
                            товаров или иных целей, связанных с работой интернет-магазина.<br> Оплата производится
                            наличными курьеру в момент доставки.&nbsp;</p>
                        <p>Минимальная сумма заказа - 100 грн. Стоимость доставки по Киеву оставляет 40 грн.
                            (малогабаритные товары), 50 грн. (крупногабаритные товары, например, компрессора с ресивером
                            и т.п.)</p>
                        <p>В случае отсутствия того или иного заказанного товара в нашем магазине,&nbsp; менеджер
                            свяжется с Вами по указанному при оформлении заказа телефону (либо по электронной почте) и
                            сообщит об этом. Также мы обязательно свяжемся с Вами в день доставки незадолго до самой
                            доставки.&nbsp;<br> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</p>
                        <h4 style="text-align:center">Самовывоз из офиса</h4>
                        <p><br> Также возможен самовывоз из нашего офиса:б-р Верховного Совета,34&nbsp;<br><strong>ПЕРЕД
                                ПРИЕЗДОМ В ОФИС ПРОСЬБА: ПРЕДВАРИТЕЛЬНО ЗВОНИТЕ!&nbsp;</strong><br>Подробности уточняйте у
                            менеджеров в телефонном режиме.</p></div>
                </div>
            </div>
        </div>',
                'seo_title' => 'Условия доставки и оплаты',
                'seo_description' => 'Условия доставки и оплаты',
                'keywords' => 'Доставка и оплата. Интернет магазин AeroShop',
            ],
            [
                'url' => 'faq',
                'title' => 'Часто задаваемые вопросы',
                'description' => '<h3>Нужен ли компрессор для аэрографа?</h3>
    <p>Для того, что бы ответить на этот вопрос определим, что означает
        аэрограф. С английского airbrush в переводе означает air - воздушная и brush- кисть. Следовательно, кисть
        (аэрограф) работает от подачи воздуха. А подачу воздуха может обеспечить не только компрессор, но
        специальные баллоны с воздухом. Некоторые используют автомобильную камеру, закачанную воздухом, для
        выполнения задач в аэрографии. Короче говоря, вы можете использовать различные приспособления с воздухом для
        работы с аэрографом. Единственное, что должны понимать, что компрессор, который предназначен для работы с
        аэрографом оборудован автооключением, регулятором подачи воздуха, манометром и т.п. Выбор всегда остается за
        вами!
    </p>
    <h3>Как очистить аэрограф от краски?</h3>
    <div>Ответ на этот вопрос вы можете посмотреть у нас в разделе статьи
        <a href="http://spektr-v.com.ua/a217803-kak-promyt-aerograf.html" target="_self">http://spektr-v.com.ua/a217803-kak-promyt-aerograf.html
            и&nbsp; </a><a href="http://spektr-v.com.ua/a217794-kak-ochistit-aerograf.html" target="_self">http://spektr-v.com.ua/a217794-kak-ochistit-aerograf.html</a>
    </div>
    <h3><span>Как выбрать аэрограф?</span></h3>
    <div>Для того, что бы подобрать нужный аэрограф. Необходимо знать для
        каких работ Вы планируете его использовать, какой мощности у вас компрессор. Например, если вы планируете
        рисовать на стенах и у Вас уже есть компрессор с ресивером, то Вам подойдет аэрограф с любым видом подачи
        (верхней, боковой, нижней).
    </div>',
                'seo_title' => 'Часто задаваемые вопросы',
                'seo_description' => 'Часто задаваемые вопросы',
                'keywords' => 'часто, задаваемые, вопросы',
            ],
            [
                'url' => 'contact-us',
                'title' => 'СВЯЗАТЬСЯ С НАМИ',
                'description' => '<p><strong>Уважаемые покупатели и партнеры!</strong></p>
    <p>Просим Вас всегда звонить и согласовывать удобное для Вас время прихода к нам (в целях экономии Вашего времени и сил).</p>
    <p>Мы всегда на связи по всем телефонам, указанным в разделе "Контакты"</p>',
                'seo_title' => 'Связаться с нами, время работы компании "AeroShop"',
                'seo_description' => 'Здесь вы можете связаться с нами, а так же узанть время работы нашей компании',
                'keywords' => 'время работы, связаться, контакты',
            ],
            [
                'url' => 'articles',
                'title' => 'Статьи',
                'description' => '',
                'seo_title' => '',
                'seo_description' => '',
                'keywords' => '',
            ],
            [
                'url' => 'news',
                'title' => 'Новости',
                'description' => '',
                'seo_title' => '',
                'seo_description' => '',
                'keywords' => '',
            ],
            [
                'url' => 'gallery',
                'title' => 'Галерея',
                'description' => '',
                'seo_title' => '',
                'seo_description' => '',
                'keywords' => '',
            ],
            [
                'url' => 'brand',
                'title' => 'Производители',
                'description' => '',
                'seo_title' => 'Производители Aeroshop',
                'seo_description' => '',
                'keywords' => '',
            ],
            [
                'url' => 'category',
                'title' => 'Список категорий',
                'description' => '',
                'seo_title' => 'Список категорий',
                'seo_description' => '',
                'keywords' => '',
            ]
        ];
    }
}
