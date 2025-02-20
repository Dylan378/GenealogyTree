<?php

namespace Database\Seeders;

use App\Console\Commands\SeedDaxcsaDistributorsData;
use App\Console\Commands\SeedMaterialsTableSeederCommand;
use App\Models\Activity;
use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DistributorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artisan::call(SeedDaxcsaDistributorsData::class);
    }
}
