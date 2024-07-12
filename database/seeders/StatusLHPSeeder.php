<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StatusLHP;

class StatusLHPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusLHP::create([
            'id_status' => 'STT01',
            'status' => 'selesai',
        ]);

        StatusLHP::create([
            'id_status' => 'STT02',
            'status' => 'evlap',
        ]);

        StatusLHP::create([
            'id_status' => 'STT03',
            'status' => 'sekretariat',
        ]);
        StatusLHP::create([
            'id_status' => 'STT04',
            'status' => 'revisi',
        ]);
    }
}
