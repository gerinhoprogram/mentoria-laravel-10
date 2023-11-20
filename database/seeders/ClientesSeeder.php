<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Cliente::create(
            [
                'nome' => 'Rogeri',
                'email' => 'mmm',
                'endereco' => 'xxx',
                'logradouro' => 'xxx',
                'cep' => 'xxx',
                'bairro' => 'zzzz'
            ]
            );

            Cliente::create(
                [
                    'nome' => 'teste',
                    'email' => 'mmm',
                    'endereco' => 'xxx',
                    'logradouro' => 'xxx',
                    'cep' => 'xxx',
                    'bairro' => 'zzzz'
                ]
                );
    }
}
