<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Produto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // para subir os dados na tabela precisa
        // referenciar o seeder
        // php artisan db:seed
        $this->call([
            ProdutosSeeder::class,
            ClientesSeeder::class,
            VendaSeeder::class,
            UsuarioSedeer::class
        ]);
    }
}
