<?php

use Illuminate\Database\Seeder;
use App\Models\ProductPropertyKey;

class ProductPropertyKeysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keys = $this->getPropertyKeys();
        foreach ($keys as $key) {
            ProductPropertyKey::firstOrCreate(
                ['ru_title' => $key['ru']],
                [
                    'en_title' => $key['en'],
                    'uk_title' => $key['uk'],
                ]
            );
        }
    }

    /**
     * get product property keys. Multilanguage
     * @return array
     */
    protected function getPropertyKeys()
    {
        return [
            ['ru' => "Форма выпуска", 'en' => 'Form of issue', 'uk' => 'Форма випуску'],
            ['ru' => "Объем", 'en' => 'Volume', 'uk' => 'Об’єм'],
            ['ru' => "Код краски", 'en' => 'Paint Code', 'uk' => 'Код фарби'],
            ['ru' => "Тип", 'en' => 'Type', 'uk' => 'Тип'],
            ['ru' => "вид", 'en' => 'kind', 'uk' => 'вид'],
            ['ru' => "Цвет", 'en' => 'Colour', 'uk' => 'Колір'],
            ['ru' => "Тип смешения", 'en' => 'Mixing Type', 'uk' => 'Тип змішування'],
            ['ru' => "Тип сопла", 'en' => 'Type of nozzle', 'uk' => 'Тип сопла'],
            ['ru' => "Ограничитель подачи краски", 'en' => 'Paint stopper', 'uk' => 'Обмежувач подачі фарби'],
            ['ru' => "Рабочее давление", 'en' => 'Operating pressure', 'uk' => 'Робочий тиск'],
            ['ru' => "Размер сопла", 'en' => 'Nozzle size', 'uk' => 'Розмір сопла'],
            ['ru' => "Объём ёмкости", 'en' => 'Volume of capacity', 'uk' => 'Об’єм ємності'],
            ['ru' => "Размер штуцера", 'en' => 'Nipple size', 'uk' => 'Розмір штуцера'],
            ['ru' => "Air control", 'en' => 'Air control', 'uk' => 'Повітряний контроль'],
            ['ru' => "Подача краски", 'en' => 'Paint supply', 'uk' => 'Подача фарби'],
            ['ru' => "Тип управления", 'en' => 'Management type', 'uk' => 'Тип управління'],
            ['ru' => "Диаметр сопла", 'en' => 'Nozzle diameter', 'uk' => 'Діаметр сопла'],
            ['ru' => "Тип подачи материала", 'en' => 'Material feed type', 'uk' => 'Тип подачі матеріалу'],
            ['ru' => "Тип посадки сопла", 'en' => 'Type of nozzle fit', 'uk' => 'Тип посадки сопла'],
            ['ru' => "Дополнительные настройки", 'en' => 'Additional settings', 'uk' => 'Додаткові налаштування'],
            ['ru' => "Диаметр входного штуцера", 'en' => 'Inlet nipple diameter', 'uk' => 'Діаметр вхідного штуцера'],
            ['ru' => "Тип упаковки", 'en' => 'Type of packaging', 'uk' => 'Тип упаковки'],
            ['ru' => "бачок боковой нижний", 'en' => 'tank side lower', 'uk' => 'бачок бічній нижній'],
            ['ru' => "дополнительное сопло", 'en' => 'additional nozzle', 'uk' => 'додаткове сопло'],
            ['ru' => "посадка сопла", 'en' => 'nozzle fit', 'uk' => 'посадка сопла'],
            ['ru' => "дополнительная игла", 'en' => 'additional needle', 'uk' => 'додаткова голка'],
            ['ru' => "принцип действия", 'en' => 'operating principle', 'uk' => 'принцип дії'],
            ['ru' => "шланг", 'en' => 'hose', 'uk' => 'шланг'],
            ['ru' => "бачок боковой верхний", 'en' => 'tank top lateral', 'uk' => 'бачок бічній верхній'],
            ['ru' => "Емкость бака распылителя", 'en' => 'Tank capacity', 'uk' => 'Ємність бака розпилювача'],
            ['ru' => "Гарантийный срок", 'en' => 'Guarantee period', 'uk' => 'Гарантійний термін'],
            ['ru' => "доп.сопло", 'en' => 'additional nozzle', 'uk' => 'доп.сопло'],
            ['ru' => "переходник", 'en' => 'adapter', 'uk' => 'перехідник'],
            ['ru' => "шланг для аэрографа в текстильной оплетке", 'en' => 'hose for airbrush in textile braiding', 'uk' => 'шланг для аерографа в текстильній оплетке'],
            ['ru' => "доп.игла", 'en' => "additional needle", 'uk' => "Доп.ігла"],
            ['ru' => "обьем емкости под краску", 'en' => "volume of capacity for paint", 'uk' => "Обьем ємності під фарбу"],
            ['ru' => "ключ для замены сопла", 'en' => "key for replacing the nozzle", 'uk' => "Ключ для заміни сопла"],
            ['ru' => "Вес", 'en' => "The weight", 'uk' => "Вага"],
            ['ru' => "Питание", 'en' => "Food", 'uk' => "Живлення"],
            ['ru' => "Производительность компрессора", 'en' => "Compressor capacity", 'uk' => "Продуктивність компресора"],
            ['ru' => "Потребляемая мощность", 'en' => "Power Consumption", 'uk' => "Споживана потужність"],
            ['ru' => "код", 'en' => "code", 'uk' => "Код"],
            ['ru' => "обьом", 'en' => 'Volume', 'uk' => 'Об’єм'],
            ['ru' => "Количество цветов в наборе", 'en' => "Number of colors in the set", 'uk' => "Кількість кольорів в наборі"],
            ['ru' => "Фасовка", 'en' => "Packing", 'uk' => "Фасовка"],
            ['ru' => "Особенность краски", 'en' => "Peculiarity of paint", 'uk' => "Особливість фарби"],
            ['ru' => "Номинальное давление", 'en' => "Rated pressure", 'uk' => "Номінальний тиск"],
            ['ru' => "Объем ресивера", 'en' => "Volume of the receiver", 'uk' => "Обсяг ресивера"],
            ['ru' => "Количество цилиндров", 'en' => "Number of cylinders", 'uk' => "Кількість циліндрів"],
            ['ru' => "Тип поршневого компрессора", 'en' => "Type of piston compressor", 'uk' => "Тип поршневого компресора"],
            ['ru' => "Длина", 'en' => "Length", 'uk' => "Довжина"],
            ['ru' => "Акриловая система", 'en' => "Acrylic System", 'uk' => "Акрилова система"],
            ['ru' => "Вид материала для наращивания ногтей", 'en' => "Type of material for nail extension", 'uk' => "Вид матеріалу для нарощування нігтів"],
            ['ru' => "ограничитель давления", 'en' => "pressure limiter", 'uk' => "Обмежувач тиску"],
            ['ru' => "шланг в текстильной оплетке", 'en' => "hose in textile braid", 'uk' => "Шланг в текстильній оплетке"],
            ['ru' => "Вес, кг", 'en' => "Weight, kg", 'uk' => "Вага, кг"],
            ['ru' => "Размер, см /д*ш*в", 'en' => "Size, cm / d * w * in the", 'uk' => "Розмір, см / д * ш * в"],
            ['ru' => "Уровень шума, дб", 'en' => "Noise level, dB", 'uk' => "Рівень шуму, дб"],
            ['ru' => "Расход воздуха", 'en' => "Air consumption", 'uk' => "Витрата повітря"],
            ['ru' => "Вид материала для дизайна ногтей", 'en' => "Type of material for the design of nails", 'uk' => "Вид матеріалу для дизайну нігтів"],
            ['ru' => "Функциональное назначение", 'en' => "Functional purpose", 'uk' => "Функціональне призначення"],
            ['ru' => "Габариты", 'en' => "Dimensions", 'uk' => "Габарити"],
            ['ru' => "штуцер подключения", 'en' => "connection fitting", 'uk' => "Штуцер підключення"],
            ['ru' => "электрический кабель", 'en' => "electrical cable", 'uk' => "електричний кабель"],
            ['ru' => "Бачки+крышки в наборе", 'en' => "Tanks + caps in the set", 'uk' => "Бачки + кришки в наборі"],
            ['ru' => "Воздушные сопла серии FineLine", 'en' => "FineLine air nozzles", 'uk' => "Повітряні сопла серії FineLine"],
            ['ru' => "Дистанционный ограничитель", 'en' => "Remote limiter", 'uk' => "Дистанційний обмежувач"],
            ['ru' => "Тип краски", 'en' => "Type of paint", 'uk' => "Тип фарби"],
            ['ru' => "Уровень шума", 'en' => "Noise level", 'uk' => "Рівень шуму"],
            ['ru' => "Классификация косметического средства", 'en' => "Classification of cosmetic products", 'uk' => "Класифікація косметичного засобу"],
            ['ru' => "Гипоаллергенно", 'en' => "Hypoallergenic", 'uk' => "Гипоаллергенно"],
            ['ru' => "Водостойкость", 'en' => "Water resistance", 'uk' => "Водостійкість"],
            ['ru' => "Тип поршневого компрессора по применению смазки", 'en' => "Type of reciprocating compressor for the use of lubricants", 'uk' => "Тип поршневого компресора по застосуванню мастила"],
            ['ru' => "Вид аксессуара для татуировок и пирсинга", 'en' => "View of an accessory for tattoos and piercings", 'uk' => "Вид аксесуара для татуювання та пірсингу"],
            ['ru' => "Применение", 'en' => "Application", 'uk' => "Застосування"],
            ['ru' => "Максимальное давление", 'en' => "Maximum pressure", 'uk' => "Максимальний тиск"],
            ['ru' => "Тип компрессора по мобильности", 'en' => "Compressor type by mobility", 'uk' => "Тип компресора по мобільності"],
            ['ru' => "Тип поршневого компрессора по количеству степеней сжатия", 'en' => "Type of reciprocating compressor by the number of compression ratios", 'uk' => "Тип поршневого компресора за кількістю ступенів стиснення"],
            ['ru' => "Производительность", 'en' => "Performance", 'uk' => "Продуктивність"],
            ['ru' => "Расположение ресивера", 'en' => "Receiver location", 'uk' => "Розташування ресивера"],
            ['ru' => "Состояние", 'en' => "Condition", 'uk' => "Стан"],
            ['ru' => "Тип изделия", 'en' => "Type of product", 'uk' => "Тип вироби"],
            ['ru' => "Предварительная запись", 'en' => "Pre-entry", 'uk' => "Попередній запис"],
            ['ru' => "Тип услуги", 'en' => "Type of service", 'uk' => "Тип послуги"],
            ['ru' => "Покрытие ногтей", 'en' => "Covering nails", 'uk' => "Покриття нігтів"],
            ['ru' => "Дизайн ногтей", 'en' => "Design of nails", 'uk' => "Дизайн нігтів"],
            ['ru' => "Вид аппарата", 'en' => "Type of apparatus", 'uk' => "Вид апарату"],
            ['ru' => "График обучения ", 'en' => "Training schedule", 'uk' => "Графік навчання"],
            ['ru' => "Продолжительность", 'en' => "Duration", 'uk' => "Тривалість"],
            ['ru' => "Особенности услуги", 'en' => "Service Features", 'uk' => "Особливості послуги"],
            ['ru' => "Тематика декора, рисунка", 'en' => "Theme of decoration, drawing", 'uk' => "Тематика декору, малюнка"],
            ['ru' => "Диаметр", 'en' => "Diameter", 'uk' => "Діаметр"],
            ['ru' => "Тип средства", 'en' => "Type of facility", 'uk' => "Тип кошти"],
            ['ru' => "Вид средства для тату, татуажа, пирсинга", 'en' => "Type of remedy for tattoo, tattoo, piercing", 'uk' => "Вид засобу для тату, татуажу, пірсингу"],
            ['ru' => "Тип пигмента", 'en' => "Pigment type", 'uk' => "Тип пігменту"],
            ['ru' => "Цвет и оттенок", 'en' => "Color and Shade", 'uk' => "Колір і відтінок"],
        ];
    }
}

