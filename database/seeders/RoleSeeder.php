<?php

namespace Database\Seeders;

use App\Facades\Services\Policies;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->registerAdministrator();
        $this->registerUser();
    }

    /**
     * Register administrator role with default policies
     *
     * @return void
     */
    private function registerAdministrator()
    {
        $administrator = Role::create([
            'id' => Role::ADMINISTRATOR,
            'role' => 'administrator'
        ]);

        foreach (Policies::all() as $key => $value) {
            $administrator->premission()
                ->create([
                    'policy' => $key,
                    'view_any' => true,
                    'view_trashed' => true,
                    'view' => true,
                    'create' => true,
                    'update' => true,
                    'delete' => true,
                    'restore' => true,
                    'force_delete' => true,
                ]);
        }
    }

    /**
     * Register user role with default policies
     *
     * @return void
     */
    private function registerUser()
    {
        if (Policies::exists('UserPolicy')) {
            Role::create([
                'id' => Role::USER,
                'role' => 'user'
            ])->premission()->create([
                'policy' => 'UserPolicy',
                'view_any' => true,
                'view_trashed' => true,
                'view' => true,
            ]);
        }
    }
}
