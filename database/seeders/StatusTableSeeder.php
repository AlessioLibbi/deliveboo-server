<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status_array = ['in preparazione', 'completato', 'in consegna', 'ricevuto', 'annullato'];
        foreach ($status_array as $status) {
            $new_status = new Status();
            $new_status->name = $status;
            $new_status->save();
        }
    }
}
