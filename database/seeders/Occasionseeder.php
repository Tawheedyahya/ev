<?php

namespace Database\Seeders;

use App\Models\Occasion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Occasionseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
               $eventTypes = [
            ['name' => 'Weddings', 'icon' => 'ev_photos/Wedding.png'],
            ['name' => 'Engagement', 'icon' => 'ev_photos/Engagement.png'],
            ['name' => 'Reception', 'icon' => 'ev_photos/Wedding.png'],
            ['name' => 'Birthday party', 'icon' => 'ev_photos/Engagement.png'],
            ['name' => 'Social gathering', 'icon' => 'ev_photos/Wedding.png'],
            ['name' => 'Corporate party', 'icon' => 'ev_photos/Engagement.png'],
            ['name' => 'Anniversary', 'icon' => 'ev_photos/Wedding.png']
        ];
        foreach($eventTypes as $event){
            Occasion::create([
                'name'=>$event['name'],
                'occasion_icon'=>$event['icon']
            ]);
        }
    }
}
