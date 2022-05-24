<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TarefasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarefas')->insert([
            'nome' => 'Tarefa 1',
            'descricao' => 'Essa inserção foi feita com o seeder',
            'arquivo' => '46fabdca30812ca6fc12b31a144b3504.jpg',
            'data' => '2021-10-05'
        ]);
        DB::table('tarefas')->insert([
            'nome' => 'Tarefa 2',
            'descricao' => 'Essa inserção foi feita com o seeder',
            'arquivo' => '46fabdca30812ca6fc12b31a144b3504.jpg',
            'data' => '2021-10-06'
        ]);
        DB::table('tarefas')->insert([
            'nome' => 'Tarefa 3',
            'descricao' => 'Essa inserção foi feita com o seeder',
            'arquivo' => '46fabdca30812ca6fc12b31a144b3504.jpg',
            'data' => '2021-10-07'
        ]);            
    }
}
