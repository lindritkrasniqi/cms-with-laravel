<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class
        ]);

        \App\Models\User::create([
            'name' => 'Lindrit Krasniqi',
            'email' => 'lindritkrasniqi@example.com',
            'password' => bcrypt('12341234'),
            'role_id' => Role::ADMINISTRATOR,
        ]);
    }
}
