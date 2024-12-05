<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
use Illuminate\Support\Facades\DB;

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

        $fornecedor->nome = 'Cuca';
        $fornecedor->site = 'fornecedorcuca.com.br';
        $fornecedor->uf = 'RN';
        $fornecedor->email = 'cuca@gmail.com';
        $fornecedor->save();

        Fornecedor::create([
            'nome' => 'adalton',
            'site'=> 'fornecedoradalton.com.br',
            'uf' => 'RN',
            'email'=> 'adalton@gmail.com',
        ]);

        DB::table('fornecedores')->insert([
            'nome' => 'ze',
            'site'=> 'fornecedorze.com.br',
            'uf' => 'RN',
            'email'=> 'ze@gmail.com',
        ]);
    }
}
