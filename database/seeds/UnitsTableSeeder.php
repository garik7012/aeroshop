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
        ];
    }
}
