<?php

use Illuminate\Database\Seeder;
use App\Models\MainPage;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $main = new MainPage();
        $main->block1 = json_encode([]);
        $main->block2 = json_encode([]);
        $main->block3 = json_encode([]);
        $main->save();
    }
}
