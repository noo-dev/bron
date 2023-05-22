<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 7; $i <= 9; $i++) {
            for ($j = 1; $j <= 10; $j++) {
                Room::create([
                    'title' => '№' . $j,
                    'room_type_id' => $i,
                ]);
            }
        }
    }
}
