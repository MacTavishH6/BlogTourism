<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name'=>'Beach'],
            ['name'=>'Mountain'],
            ['name'=>'City'],
            ['name'=>'Nature Preserve'],
            ['name'=>'Island'],
        ]);
    }
}
