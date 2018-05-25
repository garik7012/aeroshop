<?php

use Illuminate\Database\Seeder;
use App\Models\Availability;

class AvailabilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $availabilities = $this->getAvailabilities();
        foreach ($availabilities as $id => $availability) {
            Availability::firstOrCreate(
                ['id' => $id],
                [
                    'ru_title' => $availability['ru'],
                    'en_title' => $availability['en'],
                    'uk_title' => $availability['uk'],
                ]
            );
        }
    }

    /**
     * get availabilities
     * @return array
     */
    protected function getAvailabilities()
    {
        return [
            1 => ['ru' => 'В наличии', 'en' => 'In stock', 'uk' => 'В наявності'],
            2 => ['ru' => 'Нет в наличии', 'en' => 'Not available', 'uk' => 'Зараз немає'],
            3 => ['ru' => 'Под заказ', 'en' => 'Under the order', 'uk' => 'Під замовлення'],
            4 => ['ru' => 'Заканчивается', 'en' => 'Running out of', 'uk' => 'Закінчується'],
        ];
    }
}
