<?php

use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = $this->getUnits();
        foreach ($units as $id => $unit) {
            Unit::firstOrCreate(
                ['id' => $id],
                [
                    'ru_title' => $unit['ru'],
                    'en_title' => $unit['en'],
                    'uk_title' => $unit['uk'],
                ]
            );
        }
    }

    /**
     * get units
     * @return array
     */
    protected function getUnits()
    {
        return [
            1 => ['ru' => 'шт.', 'en' => 'pcs', 'uk' => 'шт'],
            2 => ['ru' => 'набор', 'en' => 'set', 'uk' => 'набір'],
            3 => ['ru' => 'день', 'en' => 'day', 'uk' => 'день'],
            4 => ['ru' => 'услуга', 'en' => 'service', 'uk' => 'послуга'],
            5 => ['ru' => "кг", 'en' => 'kg', 'uk' => 'кг'],
            6 => ['ru' => "литр/мин", 'en' => 'liter/min', 'uk' => 'літр/хв'],
            7 => ['ru' => "ватт", 'en' => 'watt', 'uk' => 'ват'],
            8 => ['ru' => "мл.", 'en' => 'ml.', 'uk' => 'мл.'],
            9 => ['ru' => "бар", 'en' => 'bar', 'uk' => 'Бар'],
            10 => ['ru' => "Вт", 'en' => 'W', 'uk' => 'Вт'],
            11 => ['ru' => "м", 'en' => 'm', 'uk' => 'м'],
            12 => ['ru' => "дБ", 'en' => 'dB', 'uk' => 'дБ'],
            13 => ['ru' => "МПа", 'en' => 'MPa', 'uk' => 'МПа'],
            14 => ['ru' => "куб. м/мин", 'en' => 'cbm/m', 'uk' => 'куб. м/хв'],
            15 => ['ru' => "см", 'en' => 'cm', 'uk' => 'см'],
            16 => ['ru' => "час", 'en' => 'hour', 'uk' => 'година'],
            17 => ['ru' => "г", 'en' => 'g', 'uk' => 'г'],
            18 => ['ru' => "мл", 'en' => 'ml', 'uk' => 'мл'],
            19 => ['ru' => "мм", 'en' => 'mm', 'uk' => 'мм'],
            20 => ['ru' => "л", 'en' => 'l', 'uk' => 'л'],
            21 => ['ru' => "мес", 'en' => 'month', 'uk' => 'міс'],
        ];
    }
}
