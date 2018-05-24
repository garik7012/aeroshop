<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = $this->getBrands();
        foreach ($brands as $brand) {
            Brand::firstOrCreate(['title' => $brand]);
        }
    }

    /**
     * Brand list
     * @return array
     */
    protected function getBrands()
    {
        return [
            'TAGORE',
            'Fengda',
            'Miol',
            'Harder&Steenbeck',
            'Badger',
            'Hansa',
            'Аква-колор',
            'BEZAN',
            'Jas',
            'Sparmax',
            'Auto Air Colors',
            'H&S',
            'Createx',
            'JVR',
            'Royalmax',
            'Iwata',
            'Navite',
            'IFOO',
            'Senjo color'
        ];
    }

}
