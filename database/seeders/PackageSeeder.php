<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Package::create([
        //     'name' => 'free',
        //     'price' => 0,
        //     'desc' => 'test'
        // ]);

        Package::create([

            'name' => json_encode([
                'en' => 'bronze',
                'ar' => 'البرونزي'
            ]),

            'price' => 250,

            'desc' => json_encode([
                'en' => 'test',
                'ar' => 'تجربة',
            ]),
        ]);

        Package::create([

            'name' => json_encode([
                'en' => 'silver',
                'ar' => 'الفضي'
            ]),

            'price' => 500,

            'desc' => json_encode([
                'en' => 'test',
                'ar' => 'تجربة',
            ]),
        ]);

        Package::create([
            'name' => json_encode([
                'en' => 'gold',
                'ar' => 'الذهبي'
            ]),

            'price' => 750,

            'desc' => json_encode([
                'en' => 'test',
                'ar' => 'تجربة',
            ]),
        ]);

        Package::create([
            'name' => 'platinum',
            'name' => json_encode([
                'en' => 'platinum',
                'ar' => 'البلاتنيوم'
            ]),

            'price' => 1000,

            'desc' => json_encode([
                'en' => 'test',
                'ar' => 'تجربة',
            ]),
        ]);
    }
}
