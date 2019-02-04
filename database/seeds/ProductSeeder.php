<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testproduct = new Product();
        $testproduct->title = 'testproduct1';
        $testproduct->code = '0001';
        $testproduct->active = true;
        $testproduct->description = 'this is test product 1';
        $testproduct->save();
    }
}
