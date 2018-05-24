<?php

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = $this->getCountries();
        foreach ($countries as $id => $country) {
            Country::firstOrCreate(
                ['id' => $id],
                [
                    'ru_title' => $country['ru'],
                    'en_title' => $country['en'],
                    'uk_title' => $country['uk'],
                ]
            );
        }
    }

    /**
     * get countries
     * @return array
     */
    public function getCountries()
    {
        return [
            1 => ['ru' => 'США', 'en' => 'USA', 'uk' => 'США'],
            2 => ['ru' => 'Китай', 'en' => 'China', 'uk' => 'Китай'],
            3 => ['ru' => 'Украина', 'en' => 'Ukraine', 'uk' => 'Україна'],
            4 => ['ru' => 'Германия', 'en' => 'Germany', 'uk' => 'Німеччина'],
            5 => ['ru' => 'Россия', 'en' => 'Russia', 'uk' => 'Росія'],
            6 => ['ru' => 'Тайвань', 'en' => 'Taiwan', 'uk' => 'Тайвань'],
            7 => ['ru' => 'Италия', 'en' => 'Italy', 'uk' => 'Італія'],
            8 => ['ru' => 'Япония', 'en' => 'Japan', 'uk' => 'Японія'],
        ];
    }
}
