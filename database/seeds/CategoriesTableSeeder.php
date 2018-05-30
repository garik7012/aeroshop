<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parentCategories = $this->getParentCategories();
        $categories = $this->getCategories();

        foreach ($parentCategories as $id => $title) {
            Category::firstOrCreate(
                ['id' => $id],
                [
                    'en_title' => trim($title['en']),
                    'ru_title' => trim($title['ru']),
                    'uk_title' => trim($title['uk']),
                ]
            );
        }

        foreach ($categories as $oldNumber => $titleAndId) {
            Category::firstOrCreate(
                ['old_number' => $oldNumber],
                [
                    'en_title' => trim($titleAndId['en']),
                    'ru_title' => trim($titleAndId['ru']),
                    'uk_title' => trim($titleAndId['uk']),
                    'parent_id' => $titleAndId['parent_id']
                ]
            );
        }
    }

    /**
     * get parent categories. now we have 8
     * @return array
     */
    public function getParentCategories()
    {
        return [
            1 => [
                'ru' => 'Готовые наборы для аэрографии',
                'uk' => 'Готові набори для аерографії',
                'en' => 'Ready-made airbrush kits',
            ],
            2 => [
                'ru' => 'Аэрографы и запчасти H&S/Hansa',
                'uk' => 'Аерографи і запчастини H&S/Hansa',
                'en' => 'Airbrushes and spare parts H&S/Hansa',
            ],
            3 => [
                'ru' => 'Аэрографы и компрессоры Fengda',
                'uk' => 'Аерографи і компресори Fengda',
                'en' => 'Fengda Airbrushes and Compressors',
            ],
            4 => [
                'ru' => 'Товары для аэрографии на ногтях (nail art)',
                'uk' => 'Товари для аерографії на нігтях (nail art)',
                'en' => 'Goods for airbrushing on nails (nail art)',
            ],
            5 => [
                'ru' => 'Товары для аэрографии на кондитерских изделиях',
                'uk' => 'Товари для аерографії на кондитерських виробах',
                'en' => 'Goods for airbrushing confectionery products',
            ],
            6 => [
                'ru' => 'Товары для аэрографии визажистов, гримеров и др.',
                'uk' => 'Товари для аерографії візажистів, гримерів і ін.',
                'en' => 'Goods for aerography of make-up artists, make-up artists, etc.',
            ],
            7 => [
                'ru' => 'Краски для аэрографии Createx и Wicked Colors',
                'uk' => 'Фарби для аерографії Createx і Wicked Colors',
                'en' => 'Paints for airbrushing Createx and Wicked Colors',
            ],
            8 => [
                'ru' => 'Краски для аэрографии Auto Air Colors',
                'uk' => 'Фарби для аерографії Auto Air Colors',
                'en' => 'Paints for airbrushing Auto Air Colors'
            ],
            9 => [
                'ru' => 'Дополнительное оборудование и аксессуары для аэрографии',
                'uk' => 'Додаткове обладнання та аксесуари для аерографії',
                'en' => 'Additional equipment and accessories for airbrushing'
            ]
        ];
    }

    /**
     * get categories
     * @return array
     */
    public function getCategories()
    {
        return [
            4425050 => [
                'ru' => 'Наборы Auto Air Color',
                'uk' => 'Набори Auto Air Color',
                'en' => 'Auto Air Color Kits',
                'parent_id' => 8
            ],
            4428994 => [
                'ru' => 'Наборы Wicked Colors',
                'uk' => 'Набори Wicked Colors',
                'en' => 'Sets of Wicked Colors',
                'parent_id' => 7
            ],
            4730230 => [
                'ru' => 'Auto Air добавки и грунт-подложки',
                'uk' => 'Auto Air добавки і грунт-підкладки',
                'en' => 'Auto Air Additives and Primer-Substrates',
                'parent_id' => 8
            ],
            4424893 => [
                'ru' => 'Candy Pigment',
                'uk' => 'Candy Pigment',
                'en' => 'Candy Pigment',
                'parent_id' => 8
            ],
            4432006 => [
                'ru' => 'Transparent',
                'uk' => 'Transparent',
                'en' => 'Transparent',
                'parent_id' => 8
            ],
            4442130 => [
                'ru' => 'Semi Opaque',
                'uk' => 'Semi Opaque',
                'en' => 'Semi Opaque',
                'parent_id' => 8
            ],
            4447604 => [
                'ru' => 'Wicked Colors ',
                'uk' => 'Wicked Colors',
                'en' => 'Wicked Colors',
                'parent_id' => 7
            ],
            4447758 => [
                'ru' => 'Wicked Fluorescent',
                'uk' => 'Wicked Fluorescent',
                'en' => 'Wicked Fluorescent',
                'parent_id' => 7
            ],
            4452289 => [
                'ru' => 'Краски для аэрографии Createx Illustration Colors (США)',
                'uk' => 'Фарби для аерографії Createx Illustration Colors (США)',
                'en' => 'Paints for airbrushing Createx Illustration Colors (USA)',
                'parent_id' => 0
            ],
            4611421 => [
                'ru' => ' Аэрографы',
                'uk' => 'Аерографи',
                'en' => 'Airbrush',
                'parent_id' => 0
            ],
            4800659 => [
                'ru' => 'Компрессоры для аэрографов',
                'uk' => 'Компресори для аерографів',
                'en' => 'Compressors for airbrushes',
                'parent_id' => 0
            ],
            6682407 => [
                'ru' => 'Подставки для аэрографов',
                'uk' => 'Підставки для аерографів',
                'en' => 'Stands for airbrushing',
                'parent_id' => 9
            ],
            6682476 => [
                'ru' => 'Емкости и бачки для аэрографов',
                'uk' => 'Ємності і бачки для аерографів',
                'en' => 'Tanks and tanks for airbrushing',
                'parent_id' => 9
            ],
            4831323 => [
                'ru' => 'Краски для аэрографии Airbrush Sector (Украина)',
                'uk' => 'Фарби для аерографії Airbrush Sector (Україна)',
                'en' => 'Paints for airbrushing Airbrush Sector (Ukraine)',
                'parent_id' => 0
            ],
            4932030 => [
                'ru' => 'Pearl and Metallic',
                'uk' => 'Pearl and Metallic',
                'en' => 'Pearl and Metallic',
                'parent_id' => 7
            ],
            4935903 => [
                'ru' => 'Wicked Detail',
                'uk' => 'Wicked Detail',
                'en' => 'Wicked Detail',
                'parent_id' => 7
            ],
            14689179 => [
                'ru' => 'Приспособления для очистки аэрографа',
                'uk' => 'Пристосування для очищення аерографа',
                'en' => 'Airbrush cleaners',
                'parent_id' => 9
            ],
            6682450 => [
                'ru' => 'Шланги',
                'uk' => 'Шланги',
                'en' => 'Hoses',
                'parent_id' => 9
            ],
            18357952 => [
                'ru' => 'Основные цвета',
                'uk' => 'Основні кольори',
                'en' => 'Primary colors',
                'parent_id' => 4
            ],
            6682471 => [
                'ru' => 'Переходники, разветвители',
                'uk' => 'Перехідники, розгалужувачі',
                'en' => 'Adapters, splitters',
                'parent_id' => 9
            ],
            6682537 => [
                'ru' => 'Запчасти для аэрографа',
                'uk' => 'Запчастини для аерографа',
                'en' => 'Spare parts for the airbrush',
                'parent_id' => 9
            ],
            8674005 => [
                'ru' => 'Товары для моделизма',
                'uk' => 'Товари для моделізму',
                'en' => 'Goods for Modeling',
                'parent_id' => 0
            ],
            12618407 => [
                'ru' => 'Наборы для аэрографии на ногтях ',
                'uk' => 'Набори для аерографії на нігтях',
                'en' => 'Sets for airbrushing on nails',
                'parent_id' => 1
            ],
            13683953 => [
                'ru' => 'Наборы для аэрографии на кондитерских изделиях',
                'uk' => 'Набори для аерографії на кондитерських виробах',
                'en' => 'Sets for airbrushing confectionery products',
                'parent_id' => 1
            ],
            16580993 => [
                'ru' => 'Трафареты для аэрографии на ногтях',
                'uk' => 'Трафарети для аерографії на нігтях',
                'en' => 'Stencils for airbrushing on nails',
                'parent_id' => 4
            ],
            12771352 => [
                'ru' => 'Аэрографы Harder & Steenbeck ',
                'uk' => 'Аерографи Harder & Steenbeck',
                'en' => 'Airbrushes Harder & Steenbeck',
                'parent_id' => 2
            ],
            12771425 => [
                'ru' => 'Запчасти для аэрографов Harder & Steenbeck ',
                'uk' => 'Запчастини для аерографів Harder & Steenbeck',
                'en' => 'Spare parts for airbrushes Harder & Steenbeck',
                'parent_id' => 2
            ],
            19403345 => [
                'ru' => 'Краски для аэрографии Wicked Colors (на розлив)',
                'uk' => 'Фарби для аерографії Wicked Colors (на розлив)',
                'en' => 'Paints for airbrushing Wicked Colors (for bottling)',
                'parent_id' => 7
            ],
            7295982 => [
                'ru' => 'Курсы аэрографии, мастер-классы ',
                'uk' => 'Курси аерографії, майстер-класи',
                'en' => 'Airbrush courses, master classes',
                'parent_id' => 0
            ],
            7318226 => [
                'ru' => 'Краски для аэрографии BADGER ',
                'uk' => 'Фарби для аерографії BADGER',
                'en' => 'Paints for airbrushing BADGER',
                'parent_id' => 0
            ],
            16580982 => [
                'ru' => 'Краски для аэрографии на ногтях',
                'uk' => 'Фарби для аерографії на нігтях',
                'en' => 'Paints for airbrushing on nails',
                'parent_id' => 4
            ],
            9584613 => [
                'ru' => 'Краска для боди-арта Make Air',
                'uk' => 'Фарба для боді-арту Make Air',
                'en' => 'Paint for body art Make Air',
                'parent_id' => 6
            ],
            9823296 => [
                'ru' => 'Трафареты для аэрографии (боди-арта, росписи на авто и др.)',
                'uk' => 'Трафарети для аерографії (боді-арту, розпису на авто та ін.)',
                'en' => 'Stencils for airbrushing (body art, painting on cars, etc.)',
                'parent_id' => 6
            ],
            11319292 => [
                'ru' => 'Аэрографы и компрессоры SPARMAX',
                'uk' => 'Аерографи і компресори SPARMAX',
                'en' => 'Airbrushes and compressors SPARMAX',
                'parent_id' => 0
            ],
            17608520 => [
                'ru' => 'Наборы для моделизма',
                'uk' => 'Набори для моделізму',
                'en' => 'Sets for Modeling',
                'parent_id' => 1
            ],
            16580673 => [
                'ru' => 'Аэрографы для ногтей',
                'uk' => 'Аерографи для нігтів',
                'en' => 'Airbrush for nails',
                'parent_id' => 4
            ],
            18357985 => [
                'ru' => 'Краска для ногтей POLYURETHANE',
                'uk' => 'Фарба для нігтів POLYURETHANE',
                'en' => 'Paint for nails POLYURETHANE',
                'parent_id' => 4
            ],
            12618770 => [
                'ru' => 'Наборы для аэромакияжа, бодиарта',
                'uk' => 'Набори для аеромакіяжа, бодіарту',
                'en' => 'Sets for aeromakyazh, body painting',
                'parent_id' => 1
            ],
            18358026 => [
                'ru' => 'Краски для аэрографии на ногтях JVR Revolution Kolor (Италия)',
                'uk' => 'Фарби для аерографії на нігтях JVR Revolution Kolor (Італія)',
                'en' => 'Paints for airbrushing on the nails of JVR Revolution Kolor (Italy)',
                'parent_id' => 0
            ],
            5743848 => [
                'ru' => 'Краски для рыболовных снастей',
                'uk' => 'Фарби для рибальських снастей',
                'en' => 'Paints for fishing tackles',
                'parent_id' => 0
            ],
            19272062 => [
                'ru' => 'Краски для аэрографии JVR Revolution Kolor (Италия)',
                'uk' => 'Фарби для аерографії JVR Revolution Kolor (Італія)',
                'en' => 'Paints for airbrushing JVR Revolution Kolor (Italy)',
                'parent_id' => 0
            ],
            19539600 => [
                'ru' => 'Аэрографы и компрессоры IWATA',
                'uk' => 'Аерографи і компресори IWATA',
                'en' => 'Airbrushes and compressors IWATA',
                'parent_id' => 0
            ],
            22514656 => [
                'ru' => 'Компрессоры для аэрографов FENGDA',
                'uk' => 'Компресори для аерографів FENGDA',
                'en' => 'Compressors for airbrushes FENGDA',
                'parent_id' => 3
            ],
            22514647 => [
                'ru' => 'Аэрографы FENGDA',
                'uk' => 'Аерографи FENGDA',
                'en' => 'FENGDA Airbrushes',
                'parent_id' => 3
            ],
            22514822 => [
                'ru' => 'Запчасти и комплектующие к аэрографам FENGDA',
                'uk' => 'Запчастини та комплектуючі до аерографа FENGDA',
                'en' => 'Spare parts and components for airbrushes FENGDA',
                'parent_id' => 3
            ],
            27049864 => [
                'ru' => 'Аэрографы, краскопульты и комплектующие NAVITE',
                'uk' => 'Аерографи, фарбопульти та комплектуючі NAVITE',
                'en' => 'Airbrushes, spray guns and accessories NAVITE',
                'parent_id' => 0
            ],
            28451468 => [
                'ru' => 'Аэрографы кондитерские и аксессуары',
                'uk' => 'Аерографи кондитерські та аксесуари',
                'en' => 'Aerografy confectionery and accessories',
                'parent_id' => 5
            ],
            28454743 => [
                'ru' => 'Готовые наборы для кондитеров',
                'uk' => 'Готові набори для кондитерів',
                'en' => 'Ready-made sets for confectioners',
                'parent_id' => 5
            ],
            17511314 => [
                'ru' => 'Аквагрим Senjo-Color',
                'uk' => 'Аквагрим Senjo-Color',
                'en' => 'Aquagrim Senjo-Color',
                'parent_id' => 6
            ],
            29916460 => [
                'ru' => 'Краски для аэрографии Createx Colors (США)',
                'uk' => 'Фарби для аерографії Createx Colors (США)',
                'en' => 'Paints for airbrushing Createx Colors (USA)',
                'parent_id' => 7
            ],
            30045904 => [
                'ru' => 'Чернила для временного тату Senjo Color',
                'uk' => 'Чорнило для тимчасового тату Senjo Color',
                'en' => 'Ink for Temporary Tattoo Senjo Color',
                'parent_id' => 6
            ],
        ];
    }
}
