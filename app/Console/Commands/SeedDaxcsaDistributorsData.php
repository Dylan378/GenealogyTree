<?php

namespace App\Console\Commands;

use App\Models\Distributor;
use Illuminate\Console\Command;

class SeedDaxcsaDistributorsData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed-daxcsa-distribuitors-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeds distributor data into the database from a JSON file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Distributor::unguard();

        $distributors = json_decode(file_get_contents(database_path('seeders/data/daxcsa.json')))->data->attributes;

        foreach ($distributors as $distributor) {
            $this->createDistributor($distributor);
        }

        Distributor::reguard();

        return Command::SUCCESS;
    }

    private function createDistributor($distributor, $parentId = null)
    {
        $parent = $parentId ? Distributor::find($parentId) : Distributor::firstOrCreate(
            ['id' => $distributor->parent_id],
            ['username' => $distributor->parent_username ?? null]
        );

        $newDistributor = Distributor::updateOrCreate(
            ['id' => $distributor->distributor_id],
            [
                'distributor_id' => $parent ? $parent->id : null,
                'username' => $distributor->username,
                'full_name' => $distributor->full_name,
                'status' => $distributor->status,
                'product_name' => $distributor->product_name,
                'category_name' => $distributor->category_name,
                'binary_placement' => $distributor->binary_placement,
            ]
        );

        if (!empty($distributor->children)) {
            foreach ($distributor->children as $child) {
                $this->createDistributor($child, $newDistributor->id);
            }
        }
    }
}
