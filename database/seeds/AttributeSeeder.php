<?php

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attr1 = new Attribute();
        $attr1->title = 'price';
        $attr1->save();
    }
}
