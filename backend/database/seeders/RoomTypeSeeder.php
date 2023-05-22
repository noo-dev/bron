<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomType;

class RoomTypeSeeder extends Seeder
{

    private $roomTypes = ['Adaty', 'Premium', 'Lýuks'];
    private $prices = [100, 200, 350];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        for ($i = 0; $i < count($this->roomTypes); $i++) {
            RoomType::create([
                'title' => $this->roomTypes[$i],
                'details' => 'Lorem ipsum dolor sit amet',
                'price' => $this->prices[$i]
            ]);
        }
    }
}
