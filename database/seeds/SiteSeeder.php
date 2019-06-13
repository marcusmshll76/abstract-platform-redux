<?php

use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sites = [[
            'id' => '1',
            'host' => 'abstract.test',
            'name' => 'Abstract Tokenization',
            'logo' => '/img/abstract-logo.png'
        ],
        [
            'id' => '2',
            'host' => 'acg.abstract.test',
            'name' => 'American Capital group',
            'logo' => '/img/acg-logo.svg'
        ]];
        DB::table('sites')->insert($sites);
    }
}
