<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'username' => 'Rose',
            'email' => 'rose@mail.com',
            'bio' => 'Je voudrais devenir enseignante pour enfantes',
            'password' => Hash::make('pwd'),
            'created_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'username' => 'Musonda',
            'email' => 'musonda@mail.com',
            'bio' => 'Je songe à devenir infirmière, j’écris mes réflexions',
            'password' => Hash::make('pwd2'),
            'created_at' => Carbon::now(),
        ]);
    }
}
