<?php

namespace Database\Seeders;

use App\Models\Venda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Venda::create(
            [
                'numero_da_venda' => '1',
                'produtos_id' => '1',
                'cliente_id' => '1'
            ]
            );

        Venda::create(
            [
                'numero_da_venda' => '2',
                'produtos_id' => '6',
                'cliente_id' => '2'
            ]
            );
    }
}
