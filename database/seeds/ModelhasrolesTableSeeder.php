<?php

use Illuminate\Database\Seeder;
use App\User;

class ModelhasrolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);

        $user->assignRole('Super Administrator');
    }
}
