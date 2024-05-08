<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 01';
        $fornecedor->site = 'www.fornecedor.com';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'for1@fornecedor.com';
        $fornecedor->save();

    }
}
