<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use estoque\Categoria;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CategoriaTableSeeder::class);

        Model::reguard();
    }
}

class CategoriaTableSeeder extends Seeder
{
    public function run()
    {
        Categoria::create(['nome' => 'ELETRONICO']);
        Categoria::create(['nome' => 'BRINQUEDO']);
        Categoria::create(['nome' => 'CAMA/MESA/BANHO']);
        Categoria::create(['nome' => 'BEBIDAS']);
    }
}
