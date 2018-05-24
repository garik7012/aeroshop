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
                    'en_title' => trim($title),
                    'ru_title' => trim($title),
                    'uk_title' => trim($title),
                ]
            );
        }

        foreach ($categories as $oldNumber => $titleAndId) {
            Category::firstOrCreate(
                ['old_number' => $oldNumber],
                [
                    'en_title' => trim($titleAndId[0]),
                    'ru_title' => trim($titleAndId[0]),
                    'uk_title' => trim($titleAndId[0]),
                    'parent_id' => $titleAndId[1]
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
            1 => 'Готовые наборы для аэрографии',
            2 => 'Аэрографы и запчасти Harder&Steenbeck/Hansa',
            3 => 'Аэрографы и компрессоры Fengda',
            4 => 'Товары для аэрографии на ногтях (nail art)',
            5 => 'Товары для аэрографии на кондитерских изделиях',
            6 => 'Товары для аэрографии визажистов, гримеров и др.',
            7 => 'Краски для аэрографии Createx и Wicked Colors',
            8 => 'Краски для аэрографии Auto Air Colors'
        ];
    }

    /**
     * get categories
     * @return array
     */
    public function getCategories()
    {
        return [
            4425050 => ['Наборы Auto Air Color', 8],
            4428994 => ['Наборы Wicked Colors', 7],
            4730230 => ['Auto Air добавки и грунт-подложки', 8],
            4424893 => ['Candy Pigment', 8],
            4432006 => ['Transparent', 8],
            4442130 => ['Semi Opaque', 8],
            4447604 => ['Wicked Colors ', 7],
            4447758 => ['Wicked Fluorescent', 7],
            4452289 => ['Краски для аэрографии Createx Illustration Colors (США)', 0],
            4611421 => [' Аэрографы', 0],
            4800659 => ['Компрессоры для аэрографов', 0],
            6682407 => ['Подставки для аэрографов', 0],
            6682476 => ['Емкости и бачки для аэрографов', 0],
            4831323 => ['Краски для аэрографии Airbrush Sector (Украина)', 0],
            4932030 => ['Pearl and Metallic', 7],
            4935903 => ['Wicked Detail', 7],
            14689179 => ['Приспособления для очистки аэрографа', 0],
            6682450 => ['Шланги', 0],
            18357952 => ['Основные цвета', 0],
            6682471 => ['Переходники, разветвители', 0],
            6682537 => ['Запчасти для аэрографа', 0],
            8674005 => ['Товары для моделизма', 0],
            12618407 => ['Наборы для аэрографии на ногтях ', 1],
            13683953 => ['Наборы для аэрографии на кондитерских изделиях', 1],
            16580993 => ['Трафареты для аэрографии на ногтях', 4],
            12771352 => ['Аэрографы Harder & Steenbeck ', 2],
            12771425 => ['Запчасти для аэрографов Harder & Steenbeck ', 2],
            19403345 => ['Краски для аэрографии Wicked Colors (на розлив)', 7],
            7295982 => ['Курсы аэрографии, мастер-классы ', 0],
            7318226 => ['Краски для аэрографии BADGER ', 0],
            16580982 => ['Краски для аэрографии на ногтях', 4],
            9584613 => ['Краска для боди-арта Make Air', 6],
            9823296 => ['Трафареты для аэрографии (боди-арта, росписи на авто и др.)', 6],
            11319292 => ['Аэрографы и компрессоры SPARMAX', 0],
            17608520 => ['Наборы для моделизма', 1],
            16580673 => ['Аэрографы для ногтей', 4],
            18357985 => ['Краска для ногтей POLYURETHANE', 0],
            12618770 => ['Наборы для аэромакияжа, бодиарта', 1],
            18358026 => ['Краски для аэрографии на ногтях JVR Revolution Kolor (Италия)', 0],
            5743848 => ['Краски для рыболовных снастей', 0],
            19272062 => ['Краски для аэрографии JVR Revolution Kolor (Италия)', 0],
            19539600 => ['Аэрографы и компрессоры IWATA', 0],
            22514656 => ['Компрессоры для аэрографов FENGDA', 3],
            22514647 => ['Аэрографы FENGDA', 3],
            22514822 => ['Запчасти и комплектующие к аэрографам FENGDA', 3],
            27049864 => ['Аэрографы, краскопульты и комплектующие NAVITE', 0],
            28451468 => ['Аэрографы кондитерские и аксессуары', 5],
            28454743 => ['Готовые наборы для кондитеров', 5],
            17511314 => ['Аквагрим Senjo-Color', 6],
            29916460 => ['Краски для аэрографии Createx Colors (США)', 7],
            30045904 => ['Чернила для временного тату Senjo Color', 6],
        ];
    }
}
