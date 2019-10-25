<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Rodrigo Gomes',
            'email' => 'rodrigo.gomes2299@cejam.org.br',
            'password' => bcrypt('ifelsee12')
        ]);
    }
}
