<?php

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = $this->getArticles();

        foreach ($articles as $article) {
            Article::firstOrCreate(['id' => $article['id']],
                [
                    'title' => $article['title'],
                    'image' => $article['image'],
                    'description' => $article['description'],
                    'seo_description' => $article['description'],
                    'content' => $article['content'],
                    'is_active' => 1
                ]
            );
        }
    }

    protected function getArticles()
    {
        return [
            [
                'id' => 1,
                'title' => 'Как выбрать свой аэрограф',
                'image' => 'img/articles/1.jpg',
                'description' => 'Рекомендации по выбору аэрографа',
                'content' => '<p><strong>"Какой аэрограф лучше?</strong>" или <strong>"Какой аэрограф необходим именно мне?"</strong> или<strong>
        "Почему я не могу получить тонкие линии моим аэрографом?" </strong>или <strong>"Я хочу новый аэрограф, чтобы
        иметь возможность делать то или другое." </strong>Все это варианты одного и того же вопроса, и на них
    практически невозможно ответить по ― другом, чем утверждением: <strong>аэрограф – это инструмент,</strong> ни
    больше, ни меньше. Так как высококачественные инструменты имеют решающее значение для любого проекта, результаты
    могут быть достигнуты с любым инструментом, все зависит от способностей человека, который держит инструмент. Будь-то
    недорогой аэрограф в руках опытного художника-аэрографиста, и мы получим профессиональные результаты. Будь лучший
    аэрограф в руках кого-то, кто никогда его не держал, то и результаты будут разочаровывающими, по меньшей мере.</p>
<p>Аэрограф не сделает в мгновение из обычного человек художника. Аэрограф, как указано выше, просто инструмент, и если
    вы ожидаете мгновенно начать творить профессионального качества рисунки, то вы, скорее всего, будете разочарованы.
    Разве вы, когда взяли свой первый карандаш, то тут же начали рисовать элегантные карандашные рисунки? Думаю, что
    нет. Только с практикой, и используя аэрограф правильно, вы достигните хороших результатов. Если вы не готовы к
    практике и учиться использовать свои инструмент должным образом, то не удивляйтесь, когда результаты будут меньше,
    чем вы ожидали.</p>
<p>&nbsp;Чтобы стать профессионалом в аэрографии, для большинства из нас на это потребуется много времени. Как научиться
    смешивать краски, как регулировать давление, как держать руку, как настроить свет, как настроить предмет, для всего
    этого необходим опыт, и это не произойдет в одночасье. Если это не то, что вы готовы сделать, то вам бы лучше
    остаться с кисточками или аэрозольными баллончиками. Вы должны решить, это для вас или нет.</p>
<p>&nbsp;Все еще здесь? Хорошо! Это означает, что есть еще надежда на вас.</p>
<p>&nbsp;Давайте начнем с рассмотрения различных типов аэрографов, потому что есть несколько различных типов и
    комбинаций этих типов. Каждый подходит для определенного способа применения.</p>
<p>&nbsp;</p>
<p><strong>Д Е Й С Т В И Е</strong></p>
<p>Аэрографы классифицируются на аэрографы "<a href="/item/p128473940-aerograf-dlya-minikompressora" target="_self">одинарного
        действия</a>" и "<a href="/item/p128486720-aerograf-professionalnyj-tg130" target="_self">двойного
        действия</a>". Оба имеют только один триггер, но триггер работает у каждого по-разному.</p>
<p>&nbsp;</p>
<p>У аэрографа<strong> одинарного действия</strong> (н-р, аэрографы&nbsp; <a href="/item/p49776540-aerograf-odinarnogo-dejstviya"
            target="_self"><strong>TG148</strong></a>, <a href="/item/p49767985-aerograf-professionalnyj-konusnoe"
            target="_self"><strong>TG135N</strong> ) </a>триггер только контролирует поток воздуха. Нажмите на спусковой
    крючок вниз и воздух начнет проходит через аэрограф для распыления краски. Отпусти курок и воздушный поток
    остановится. Объем краски регулируется путем регулировки глубины, на которую игла перемещается в сопло. Это, как
    правило, осуществляется с помощью регулировочного винта на аэрографе, часто на задней панели.</p> В аэрографах
<strong>двойного действия</strong> (например,<a href="/item/p49755333-aerograf-professionalnyj-tg130"
        target="_self"><strong>TG130</strong></a>, <a href="/item/p83453572-aerograf-professionalnyj-03mm"
        target="_self"><strong>TG182C</strong></a>, <a href="/item/p83452664-aerograf-professionalnyj-025mm"
        target="_self"><strong>TG182</strong></a> и др.) триггер управляет и воздушным потоком и объемом краски. Нажмите
на спусковой крючок (триггер) вниз и воздух проходит через аэрограф, как в аэрографах одинарного действия. Нажмите на
спусковой крючок назад, и это позволит поступать краске. Чем дальше на спусковой крючок, тем больше краска поступает в
воздушный поток. Таким образом, аэрограф двойного действия способен обеспечить подачу различного количества краски. Вы
не нужно останавливаться, что бы отрегулировать поток краски, а затем начинать распыление снова. <p>В общем, аэрограф
    двойного действия является гораздо более гибким в использовании, чем аэрограф одинарного действия. При создании
    масштабных моделей, возможность регулировки потока краски "на лету" имеет большое значение. Это не означает, что
    аэрограф двойного действия имеет решающее значение для создания картин. Есть много людей, которые используют
    аэрографы одинарного действия очень хорошо. Возвращаемся к понятию, что аэрограф это всего лишь инструмент, и то,
    что работает лучше всего для одного человека, не является автоматически лучшим выбором для всех. Чтобы привыкнуть к
    аэрографам двойного действия требуется немного больше времени, потому что ваша рука должна сделать две вещи сразу.
    Это незначительное неудобство, что многие преодолевают очень быстро.</p>
<p>&nbsp;</p>
<p><strong>П О Д А Ч А &nbsp; &nbsp; &nbsp;М А Т Е Р И А Л А</strong></p>
<p>&nbsp;Аэрографам для работы требуется как воздух, так и краска. С воздухом все просто ― подключить аэрограф к
    источнику воздуха (компрессору), и давление делает все остальное. Подача краски отличается тем, что она не находится
    под любым внешним давлением. Как правило, используется два типа подачи краски для аэрографов: корма "Гравитация" и
    корма "Сифон".</p>
<p>Аэрографы, с кормой гравитационного типа, как правило, имеют краски чашку на верхней или боковой стороне аэрографа.
    Краску выливают в чашку и сила тяжести тянет незначительное количество вниз в смесительную камеру, где она
    распределяется и распыляется аэрографом.</p>
<p>Аэрографы, с кормой Сифон, также называемые аэрографы "<strong>Нижняя подача</strong>" работают по принципу сифона.
    Бутылка, или другой контейнер (баночка), подключен к нижней части аэрографа и трубка проходит от аэрографа вниз в
    бутылочку. Так как воздух выдувается через верхнюю часть трубки, краска вытягивается в смесительную камеру, где она
    распределяется и распыляется.</p>
<p><img alt="" src="https://images.ua.prom.st/269325341_w640_h2048_125523.jpg?PIMAGE_ID=269325341"
        style="width:396px;height:216px"> <img alt=""
                                               src="https://images.ua.prom.st/269326116_w640_h2048_000510020.jpg?PIMAGE_ID=269326116"
                                               style="width:500px;height:500px"></p>
<p>Есть также некоторые "гибридный" аэрографы, которые совмещают в себе несколько видов подачи краски.&nbsp;</p>'
            ],
            [
                'id' => 2,
                'title' => 'Советы и рекомендации мастера nail art',
                'image' => 'img/articles/2.jpg',
                'description' => 'рекомендации по ногтевой аэрографии',
                'content' => '<p style="">Создавать настоящие шедевры на ногтях поможет
    умение обращаться с <a href="/category/19">аэрографом</a>. С его помощью процесс художественного маникюра
    напоминает создание произведения искусства – от простой совершенно белой основы, происходит превращение до
    неповторимой картины, богатой и насыщенной красками. Такая картина будет создавать иллюзию движения линий,
    отличаться романтичностью и легкостью, плавностью переходов от насыщенных и темных оттенков к прозрачным и
    светлым.</p>
<p style="">Для того чтобы обладать поистине волшебной кистью, необходимо приобрести:</p>
<p style="">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; современный аэрограф, который удобно лежит в руке, быстро
    разбирается, имеет подходящую емкость для краски и удобное регулирование;</p>
<p style="">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; соответствующий по мощности компрессор с минимальным рабочим
    шумом;</p>
<p style="">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; различные трафареты, соответствующие размеру ногтя;</p>
<p style="">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; акриловые краски для дизайна ногтей.</p>
<p style="">Затраты на покупку дорогого аппарата окупятся его долговечностью, неограниченными возможностями
    реализации своих фантазий и пожеланий заказчиков.</p>
<p style="">Но получить настоящее удовольствие от работы можно только после приобретения некоторого опыта.</p>
<p style="">На этапе освоения воздушной кисти необходимо учесть следующее:</p>
<p style="">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; перед началом работы удостовериться в чистоте инструмента,
    промывать при смене красок и по окончании работы;</p>
<p style="">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; до нанесения рисунка обезжирить ноготь и покрыть базой,
    только затем выполнять дизайн;</p>
<p style="">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; не заливать много краски, иметь под рукой бумажное полотенце
    для удаления ее излишка;</p>
<p style="">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; для оптимального распыления материала держать аэрограф под
    углом 90°;</p>
<p style="">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; постоянно перемещать прибор во избежание потеков краски;</p>
<p style="">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; не наносить много краски за один прием;</p>
<p style="">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; только после высыхания краски можно исправлять ошибки;</p>
<p style="">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; нанести на готовый рисунок фиксирующее покрытие;</p>
<p style="">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; после полного высыхания краски осторожно очистить
    запачканную кожу средством для снятия лака.</p>
<p style="">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; оберегать кончик иглы и кольцеобразные прокладки от
    повреждений;</p>
<p style="">Обучиться профессиональной работе на аэрографе можно на качественных курсах у опытных мастеров, а для
    успешного овладения навыками лучше приобрести оборудование и нарабатывать навыки обращения и ухода с
    моделью.</p>
<p style="">&nbsp;</p>
<p style="">А вот и пошаговая инструкция:</p>
<p style="">&nbsp;</p>
<p style=""><strong>Шаг 1.</strong> Покрываем ногти гель лаком светлого цвета, убираем липкость, слегка шлифуем.
    Топом можно не перекрывать, но если при снятии липкого слоя, цвет вытирается, тогда лучше перекрыть.</p>
<p style=""><img alt="" src="https://images.ua.prom.st/213866898_w640_h2048_1.jpg?PIMAGE_ID=213866898"
                 style="width:604px;height:361px"></p>
<p style=""><strong>Шаг 2.</strong> Приклеиваем наклейки / прикладываем трафареты.</p>
<p style=""><img alt="" src="https://images.ua.prom.st/213866979_w640_h2048_2.jpg?PIMAGE_ID=213866979"
                 style="width:604px;height:361px"></p>
<p style=""><strong>Шаг 3</strong>. Аэрографом создаем дизайн разных цветов.</p>
<p style=""><img alt="" src="https://images.ua.prom.st/213867077_w640_h2048_3.jpg?PIMAGE_ID=213867077"
                 style="width:604px;height:361px"></p>
<p style=""><strong>Шаг 4.</strong> Аккуратно, острым пинцетом убираем наклейки.</p>
<p style=""><img alt="" src="https://images.ua.prom.st/213867100_w640_h2048_4.jpg?PIMAGE_ID=213867100"
                 style="width:604px;height:361px"></p>
<p style=""><strong>Шаг 5.</strong> Перекрываем топом, убираем липкость и одновременно краску, попавшую на кожу
    вокруг ногтя.</p>
<p style=""><img alt="" src="https://images.ua.prom.st/213867467_w640_h2048_5.jpg?PIMAGE_ID=213867467"
                 style="width:604px;height:361px"></p>
<p style="">Любуемся результатом.</p>
<p style=""><img alt="" src="https://images.ua.prom.st/213867779_w640_h2048_6.jpg?PIMAGE_ID=213867779"
                 style="width:604px;height:342px"></p>
<p style="">&nbsp;</p>
<p style="">Вдохновений Вам и творческих успехов!</p>',
            ],
            [
                'id' => 3,
                'title' => 'Как промыть аэрограф с верхней подачей для замены краски',
                'image' => 'img/articles/3.jpg',
                'description' => 'Правильная очистка аэрографа с верхней подачей при смене красок',
                'content' => '<p><strong><span>Промывка аэрографа с верхней подачей материала для замены краски</span></strong></p>
<p><span class="translation-chunk"><span style="color:rgb(34, 34, 34)">&nbsp;</span></span></p>
<p><span class="translation-chunk"><span style="color:rgb(34, 34, 34)">Обычно время замены цвета краски, это время, чтобы очистить аэрограф. Это предотвращает смешивания цветов и избежание получения грязного цвета. Нужно также будет смыть накопления, которые получим в результате очистки.</span></span>
</p>
<p><span class="translation-chunk"><span style="color:rgb(34, 34, 34)">&nbsp;</span></span><span
            class="translation-chunk"><span style="color:rgb(34, 34, 34)">Достаточно выбрать, какая картинка соответствует именно Вашему аэрографу.</span></span>
</p>
<p><img alt="" src="https://images.ua.prom.st/265680811_w640_h2048_150x176xside_f__guksftz7pv.jpg?PIMAGE_ID=265680811"
        style="width:150px;height:176px">&nbsp;<img alt=""
                                                    src="https://images.ua.prom.st/265681232_w640_h2048_gravity_feed_a_cup.jpg?PIMAGE_ID=265681232"
                                                    style="width:150px;height:176px">&nbsp;<img alt=""
                                                                                                src="https://images.ua.prom.st/265681299_w640_h2048_gravity_feed_c_cup.jpg?PIMAGE_ID=265681299"
                                                                                                style="width:150px;height:176px">&nbsp;<img
            alt="" src="https://images.ua.prom.st/265681917_w640_h2048_siphon_feed_color_stem.jpg?PIMAGE_ID=265681917"
            style="width:150px;height:176px"></p>
<p><span class="translation-chunk"><span style="color:rgb(34, 34, 34)"></span></span></p>
<p><span style="color:rgb(34, 34, 34)"></span>а)аэрограф с боковой подачей материала</p>
<p>б)аэрограф с внутренней подачей мтериала</p>
<p>в) аэрограф с верхней подачей материала</p>
<p>г)аэрограф с нижней подачей материала</p>
<p><span style="color:rgb(34, 34, 34)"></span><strong><span class="translation-chunk"><span
                    style="color:rgb(34, 34, 34)">Рассмотрим замену цвета в аэрографе с верхней подачей материала </span></span></strong><span
            class="translation-chunk"><span style="color:rgb(34, 34, 34)"></span></span></p>
<p><span class="translation-chunk"><span style="color:rgb(34, 34, 34)">Промывайте бачок/емкость для верхней подачи материала аэрографа при смене цвета краски. Это предотвратит чрезмерное налипание краски и смешивание цветов краски между собой.</span></span>
</p>
<p><span class="translation-chunk"><span style="color:rgb(34, 34, 34)">Этот метод, известный также как полоскание с заменой цвета, это лучшее, что вы можете сделать, чтобы предотвратить будущие проблемы аэрографа, прежде чем они имеют шанс стать проблемами.</span></span>
</p>
<p><strong><span class="translation-chunk"><span style="color:#222222">1.<span
                        style="font-size:7pt">&nbsp;&nbsp;&nbsp; </span></span></span><span
                class="translation-chunk"><span
                    style="color:rgb(34, 34, 34)">Слейте с чаши аэрографа оставшуюся краску.</span></span></strong></p>
<p><span class="translation-chunk"><span style="color:rgb(34, 34, 34)"><img alt=""
                                                                            src="https://images.ua.prom.st/265683420_w640_h2048_gravity_feed_c___empty_cup.jpg?PIMAGE_ID=265683420"
                                                                            style="width:420px;height:236px"></span></span>
</p>
<p><strong><span class="translation-chunk"><span style="color:#222222">2.<span
                        style="font-size:7pt">&nbsp;&nbsp;&nbsp; </span></span></span><span
                class="translation-chunk"><span style="color:rgb(34, 34, 34)">Добавьте в чашу для краски средство для очистки аэрографа</span></span></strong>
</p>
<p><img alt="" src="https://images.ua.prom.st/265689707_w640_h2048_gravity_feed_c__dd_cleaner.jpg?PIMAGE_ID=265689707"
        style="width:420px;height:236px"></p>
<p><strong><span class="translation-chunk"><span style="color:#222222">3.<span style="font-size:7pt">&nbsp; &nbsp; &nbsp;&nbsp;</span></span></span><span
                class="translation-chunk"><span style="color:rgb(34, 34, 34)">Протрите чашу бумажными салфетками или ватными палочками</span></span></strong>
</p>
<p><img alt="" src="https://images.ua.prom.st/265690548_w640_h2048_gravity_feed_c__3_wipe_cup.jpg?PIMAGE_ID=265690548"
        style="width:420px;height:236px"></p>
<p>&nbsp;<strong>&nbsp;<span class="translation-chunk" style=""><span style="color:#222222">4.<span
                        style="font-size:7pt">&nbsp;&nbsp;&nbsp; </span></span></span><span class="translation-chunk"
                                                                                            style=""><span
                    style="color:rgb(34, 34, 34)">Влейте еще средство для очистки в чашу</span></span></strong></p>
<p><img alt="" src="https://images.ua.prom.st/265691419_w640_h2048_gravity_feed_c__ay_cleaner.jpg?PIMAGE_ID=265691419"
        style="width:420px;height:236px"></p>
<p style=""><strong><span class="translation-chunk"><span style="color:#222222">5.<span style="font-size:7pt">&nbsp;&nbsp;&nbsp; </span></span></span><span
                class="translation-chunk"><span style="color:rgb(34, 34, 34)">Распылите средство для очистки через аэрограф, пока он не начнет распылять </span></span></strong>
</p>
<p style=""><strong><span class="translation-chunk"><span
                    style="color:rgb(34, 34, 34)">без примеси краски.</span></span></strong></p>
<p><span class="translation-chunk"><span style="color:#222222"><strong>Примечание: </strong>Распыляйте в защитной маске. Это не позволит попасть вредным частичкам&nbsp;из воздуха в легкие.&nbsp;</span></span>
</p>
<p><strong><span class="translation-chunk"><span style="color:rgb(34, 34, 34)">&nbsp;</span></span><span
                class="translation-chunk"><span style="color:#222222">6.<span
                        style="font-size:7pt">&nbsp;&nbsp;&nbsp; </span></span></span><span
                class="translation-chunk"><span
                    style="color:rgb(34, 34, 34)">Слейте остатки жидкости</span></span></strong></p>
<p><span class="translation-chunk"><span style="color:rgb(34, 34, 34)"><img alt=""
                                                                            src="https://images.ua.prom.st/265691978_w640_h2048_gravity_feed_c__ty_cleaner.jpg?PIMAGE_ID=265691978"
                                                                            style="width:420px;height:236px"></span></span>
</p>
<p><strong><span class="translation-chunk"><span style="color:#222222">7.<span
                        style="font-size:7pt">&nbsp;&nbsp;&nbsp; </span></span></span><span
                class="translation-chunk"><span
                    style="color:rgb(34, 34, 34)">Распылите до сухости</span></span></strong></p>
<p><img alt="" src="https://images.ua.prom.st/265692194_w640_h2048_gravity_feed_c__er_cleaner.jpg?PIMAGE_ID=265692194"
        style="width:420px;height:236px"></p>
<p><span class="translation-chunk"><span style="color:rgb(34, 34, 34)"></span></span></p>
<p style=""><strong><span class="translation-chunk"><span style="color:#222222">&nbsp;8.<span style="font-size:7pt">&nbsp; &nbsp;&nbsp; </span></span></span><span
                class="translation-chunk"><span style="color:rgb(34, 34, 34)">Залейте следующий цвет&nbsp;</span></span></strong>
</p>
<p style="">&nbsp;</p>
<p style=""><span class="translation-chunk"><span style="color:rgb(34, 34, 34)"></span></span></p>
<p><span class="translation-chunk"><span style="color:rgb(34, 34, 34)">&nbsp;<img alt=""
                                                                                  src="https://images.ua.prom.st/265693963_w640_h2048_next_color_big.jpg?PIMAGE_ID=265693963"
                                                                                  style="width:420px;height:191px"></span></span>
</p>
<p style=""><strong><span class="translation-chunk"><span
                    style="color:rgb(34, 34, 34)">Советы гуру</span></span></strong><span
            class="translation-chunk"><span style="color:rgb(34, 34, 34)"></span></span></p>
<ul>
    <li><span class="translation-chunk"><span style="color:rgb(34, 34, 34)">&nbsp;<span class="translation-chunk"><span
                            style="color:rgb(34, 34, 34)">&nbsp;Используйте \'соответствующее\' очищающее средство для вашей краски. Это, как правило, разбавитель или основа химической краски.</span></span></span></span>
    </li>
    <li><span class="translation-chunk"><span style="color:rgb(34, 34, 34)">&nbsp;</span></span><span
                class="translation-chunk"><span style="color:rgb(34, 34, 34)">Не используйте аммиак для очистки от краски аэрографа. Аммиак, это плохо для самого аэрографа.</span></span>
    </li>
    <li><span class="translation-chunk"><span style="color:rgb(34, 34, 34)">&nbsp;</span></span><span
                class="translation-chunk"><span style="color:rgb(34, 34, 34)">Ваша скорость будет улучшаться, не волнуйтесь, если время, проведенное здесь, вам покажется долгим. Ваша скорость будет увеличиваться, чем более знакомыми и привычными вам станут эти методы.</span></span>
    </li>
    <li><span class="translation-chunk"><span style="color:rgb(34, 34, 34)">Закончился ли Ваш рабочий день? Собираетесь вы на обед или на перерыв? В конце работы не забывайте промыть аэрограф, прежде чем уйти.</span></span>
    </li>
</ul>
<p><span class="translation-chunk"><span style="color:rgb(34, 34, 34)">Если у вас возникли проблемы, возможно, после окончания промывки потребуется перейти к следующему шагу. Если это так, вы можете попробовать ...<strong> метод глубокой очистки</strong>. Убедитесь, что вы правильно выбрали инструкцию по очистке.</span></span>
</p>
<p>&nbsp;</p>',
            ],
            [
                'id' => 4,
                'title' => 'Как выбрать аэрограф для ногтей',
                'image' => 'img/articles/4.jpg',
                'description' => 'Какой аэрограф подойдет для ногтей',
                'content' => '<p>Какой же набор для <a href="category/1">аэрографии</a> выбрать: беленький или черненький?!</p>
<p>Для выполнения задач аэрографии в ногтевом сервисе достаточно небольшого <a
            href="/g4800659-kompressory-dlya-aerografov">компрессора и аэрографа</a> с <strong>соплом от 0,2 мм</strong>.
    Параметры компрессора, в среднем следующие: <strong>скорость подачи воздуха</strong> 7-13 л/мин, <strong>рабочее
        давление</strong> 0,8 – 1,8 бар. Можно, конечно, выбрать компрессор и мощнее, но тогда желательно, для контроля
    потока воздуха, чтобы&nbsp; на этом компрессоре был&nbsp; регулятор подачи воздуха.</p>
<p>Что касается аэрографов, то на рыке самыми популярными в 2017-2018 гг являются аэрографы с резьбовым сопло 0,2 – 0,25
    мм с верхней загрузкой материала. Необходимо отметить, что ранее были популярны аэрографы с соплом 0,3 мм.</p>
<p>Выбор в пользу аэрографа с меньшим диаметром сопла связана с тем, что усовершенствовались и материалы для аэрографии
    в ногтевом сервисе, например, появились краски с более мелким помолом пигмента. Помним, что чем меньше помол
    пигмента у красок, тем диаметр сопла аэрографа может быть меньше.</p>
<p>На что еще нужно ориентироваться при выборе <a href="/category/32">аэрографа для ногтей</a>. Если
    вкратце, то аэрографы бываю одинарного и двойного действия.</p>
<p>В аэрографах одинарного действия, воздух проходит через аэрограф постоянно, нужно только отклонять курок (триггер)
    назад для подачи краски.</p>
<p>Принцип работы аэрографов двойного действия немного отличается от одинарного. В таких моделях можно контролировать и
    подачу воздуха – нажав курок вниз, а при отведении курок назад – и подачу краски. При работе с таким аэрографом
    специалисты рекомендуют помнить основное правило <strong>«воздух- краска- воздух»</strong>.</p>
<p>Еще для достижения более точных результатов в аэрографии можно&nbsp; выбрать аэрограф с дополнительными настройками:
    с регуляторами подачи воздуха и подачи материала, с корончатым диффузором для того, чтобы просматривать струю краски
    и т.п.</p>
<p>Часто еще покупатели просят посоветовать надежный и простой в эксплуатации аэрограф.</p>
<p>Честно говоря, при правильной эксплуатации, соответствовать таким требованиям может быть любой, выбранный вами
    аэрограф. Но все же есть действительно один вариант – это аэрограф с конусным соплом. Конструктивная особенность
    этого аэрографа позволяет его достаточно легко разобрать, т.к. соплом конусное массивнее, &nbsp;чем резьбовое и не
    имеет резьбы, оно просто вставляется в посадочное место для сопла в аэрографе, а не вкручивается как резьбовое.</p>
<p>Аэрограф с конусным соплом отлично подходит для создания градиентов и для работы с гель лаками.</p>
<p>Резюмируя вышеизложенное, мастеру ногтевого сервиса подойдет аэрограф с верхней загрузкой материала как одинарного,
    так и двойного действия с конусным или резьбовым соплом от 0,2 до 0,3 мм и миникомпрессор, который обеспечивает
    подачу воздуха 7-13 л/мин.</p>
<p>&nbsp;</p>',
            ],
            [
                'id' => 5,
                'title' => 'Аэрография ЗD на шлеме',
                'image' => 'img/articles/5.jpg',
                'description' => 'Аэрография шаг за шагом "ЗD мозг" на шлеме',
                'content' => '<p><strong>Аэрография шаг за шагом «ЗD мозг» на шлеме</strong></p>
<p>
    <iframe frameborder="0" height="340" src="https://www.youtube.com/embed/BWvqkH0oKrg?rel=0&amp;wmode=transparent"
            width="560"></iframe>
</p>
<p>Спецэффекты на шлемах пользуются большим спросом и вызывают большой интерес, особенно когда моделируют специальные
    эффекты, такие как органические ткани. Шаг за шагом мы увидим, как реализовать от руки специальный эффект "Мозг на
    шлеме", начиная без эталонных изображений, чтобы создать полностью настраиваемую работу аэрографа.</p>
<p>В иллюстрации очень важно - &nbsp;прежде, чем начать работу, подготовить цветовые тона, которые будут использоваться.
    Большую помощь обеспечивают пустые бутылки.</p>
<p>Я выбираю яркую цветовую палитру, для того, чтобы не было эффекта брызг.</p>
<p>Аэрограф:&nbsp;<a href="/item/p518010106-aerograf-iwata" target="_blank">iwata HP-B Plus</a></p>
<p>Краски: <strong><a href="/category/23" target="_self">Wicked</a></strong>,
    <strong><a href="/category/23" target="_self">Createx
            Illustration</a></strong>, Golden Airbrush&nbsp; &nbsp;</p>
<p>&nbsp;</p>
<p><strong>Шаг 1</strong></p>
<p>Я начинаю черновую обрисовку карандашом непосредственно на шлеме, подготовленном&nbsp;для аэрографии.</p>
<p><img alt="" src="https://images.ua.prom.st/98698088_w640_h2048_1_step_by_step__ect_helmet.jpg?PIMAGE_ID=98698088"
        style="width:480px;height:640px">&nbsp; &nbsp; &nbsp;</p>
<p><strong>Шаг 2</strong></p>
<p>Я распыляю тон кожи, приготовленный из <strong><a href="/category/23" target="_self">Wicked Colors</a></strong>&nbsp;, затем я разбавляю
    основу в масштабе 1: 1 деминерализованной водой. Я моделирую тени вручную, выводя наружу общие объемы.</p>
<p><img alt="" src="https://images.ua.prom.st/98698100_w640_h2048_2a_step_by_ste__ect_helmet.jpg?PIMAGE_ID=98698100"
        style="width:480px;height:640px"></p>
<p><strong>Шаг 3</strong></p>
<p>Я начал&nbsp;обрисовку внутренних частей мозга с <strong><a href="/item/p44723696-kraska-dlya-aerografii" target="_self">Createx Illustration
            Burnt Sienna</a></strong>&nbsp;(жженая сиена). Я обращаю ваше внимание, делаю это избегая толчков. Иду с
    иглой аэрографа близко к поверхности (примерно 5 мм). Я рекомендую удаление иглы колпачком вручную: это делает
    аэрограф четче и точнее.</p>
<p><img alt="" src="https://images.ua.prom.st/98698113_w640_h2048_3.jpg?PIMAGE_ID=98698113"
        style="width:480px;height:640px"></p>
<p><img alt="" src="https://images.ua.prom.st/98698338_w640_h2048_4.jpg?PIMAGE_ID=98698338"
        style="width:480px;height:640px"></p>
<p><strong>Шаг 4</strong></p>
<p>Я углубляю самые темные тени ранее нарисованных <strong><a href="/item/p44723696-kraska-dlya-aerografii" target="_self">Createx Illustration
            Burnt Sienna</a></strong>&nbsp;(жженая сиена) с помощью Golden Airbrush Raw Umber Hue.</p>
<p><img alt="" src="https://images.ua.prom.st/98698294_w640_h2048_5.jpg?PIMAGE_ID=98698294"
        style="width:480px;height:640px"></p>
<p><strong>Шаг 5</strong></p>
<p>Golden naphtol Red Light&nbsp; разбавляют деминерализованной водой (1: 3). Я прорисовываю мелкие капилляры на всей
    поверхности мозга.</p>
<p><img alt="" src="https://images.ua.prom.st/98698345_w640_h2048_6.jpg?PIMAGE_ID=98698345"
        style="width:480px;height:640px"></p>
<p><strong>Шаг 6</strong></p>
<p>С <strong><a href="/item/p44650824-kraska-dlya-aerografii" target="_self">Createx Illustration
            White</a></strong>&nbsp; я подсвечиваю все отражающие части, придавая больший объем.</p>
<p><img alt="" src="https://images.ua.prom.st/98698362_w640_h2048_7.jpg?PIMAGE_ID=98698362"
        style="width:480px;height:640px"></p>
<p><strong>Шаг 7</strong></p>
<p>Используя Golden Airbrush transparent - Quinacridone Magenta&nbsp; я&nbsp;тонирую центральную и нижнюю часть
    мозга.</p>
<p><strong>Шаг 8</strong></p>
<p>Покрываю лаком в&nbsp;студии. Наслаждайтесь!</p>
<p><img alt="" src="https://images.ua.prom.st/98698371_w640_h2048_8.jpg?PIMAGE_ID=98698371"
        style="width:480px;height:475px"></p>
<p>&nbsp;</p>',
            ],
            [
                'id' => 6,
                'title' => 'Аэрограф в каждый дом. Реальное применение',
                'image' => 'img/articles/6.jpg',
                'description' => 'Применение аэрографа в доме. Костюм к утреннику',
                'content' => '<p><a href="/category/19">Аэрограф</a> необходимая вещи в каждом доме) И этому есть подтверждение. Ранее мы
    рассказывали, как можно с помощью аэрографа украсить жилище к новогодним праздникам.&nbsp;</p>
<p>Сегодня очередной эксперимент с помощью этого волшебного инструмента. Почему волшебного?! Потому что с его помощью
    можно превратить скучные вещи в яркие и интересные. Наверное, каждому родитель озадачивался поиском и оформление
    костюма для очередного утренника в садик/школу. Эта участь не миновала и нас.&nbsp;</p>
<p>Задача предстояла следующая: преобразить скучный костюмчик беленького мотылька&nbsp;в прекрасную яркую красавицу
    бабочку.&nbsp;</p>
<p><img alt=""><img alt=""
                    src="https://images.ua.prom.st/1090811859_w640_h2048_airbrush_butterfly_1.jpg?PIMAGE_ID=1090811859"
                    style="width:428.991px;height:285.98px"></p>
<p>И тут нам в помощь пригодился набор для аэрографии Tagore и краски для аэрографии JVR. Помним, что для работы с
    аэрографом нужен компрессор, который обеспечивает подачу воздуха.&nbsp;</p>
<p>И шаг за шагом мы покрывали беленькие крылышки яркими красками.</p>
<p><img alt="" src="https://images.ua.prom.st/1090816150_w640_h2048_airbrush_butterfly_2.jpg?PIMAGE_ID=1090816150"
        style="width:245.994px;height:163.963px">&nbsp;<img alt=""
                                                            src="https://images.ua.prom.st/1090816792_w640_h2048_airbrush_butterfly_3.jpg?PIMAGE_ID=1090816792"
                                                            style="width:245.994px;height:163.963px">&nbsp;<img alt=""
                                                                                                                src="https://images.ua.prom.st/1090819278_w640_h2048_airbrush_butterfly_5.jpg?PIMAGE_ID=1090819278"
                                                                                                                style="width:245.994px;height:163.963px">
</p>
<p>И в результате не сложный манипуляций аэрографом мы получили желаемый результат.&nbsp; Решили разукрасить так же
    фатин на юбочке, которая шла в комплекте с крылышками.&nbsp;</p>
<p><img alt="" src="https://images.ua.prom.st/1090818803_w640_h2048_airbrush_butterfly_6.jpg?PIMAGE_ID=1090818803"
        style="width:460px;height:306.974px"></p>
<p>Вот так с помощью аэрографа можно создавать оригинальные и неповторимые вещи!&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>'
            ]
        ];
    }
}
