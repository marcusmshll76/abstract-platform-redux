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
        DB::table('sites')->insert([
            'id' => '1',
            'host' => 'abstract.test',
            'name' => 'Abstract Tokenization',
            'logo' => '/img/abstract-logo.png',
        ]);
    }
}
