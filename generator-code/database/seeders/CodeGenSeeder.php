<?php

namespace Database\Seeders;

use App\Models\CodeGenModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CodeGenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CodeGenModel::factory(10)->create();    
    }
}
