<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'name' => 'Lara Smith',
            'email' => 'larasmith@gmail.com',
            'password'=> 'geheim',
        ]);
        DB::table('contacts')->insert([
            'name' => 'John Smith',
            'email' => 'johnsmith@gmail.com',
            'password'=> 'geheim',
        ]);
        DB::table('contacts')->insert([
            'name' => 'Lupitha Smith',
            'email' => 'Lupithasmith@gmail.com',
            'password'=> 'geheim',
        ]);

    }
}
