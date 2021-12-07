<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert($this->roles());
    }


    private function roles()
    {
        $now = now()->toDateTimeString();

        return [
            ['id' => Role::ADMINISTRATOR, 'role' => 'administrator', 'created_at' => $now, 'updated_at' => $now],
            ['id' => Role::MENAGER, 'role' => 'menager', 'created_at' => $now, 'updated_at' => $now],
            ['id' => Role::USER, 'role' => 'user', 'created_at' => $now, 'updated_at' => $now]
        ];
    }
}
