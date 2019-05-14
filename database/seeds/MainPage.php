<?php

use Illuminate\Database\Seeder;

use App\Models\MainPage as Page;
class MainPage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $main = new Page();
        $main->block1 = json_encode([]);
        $main->block2 = json_encode([]);
        $main->block3 = json_encode([]);
        $main->save();
    }
}
