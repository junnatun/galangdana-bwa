<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $ownerRole = Role::create([
            'name' => 'owner'
        ]);
        $fundraiserRole = Role::create([
            'name' => 'fundraiser'
        ]);
        $userOwner = User::create([
            'name' => 'Junnatun',
            'avatar' => 'images/default-avatar.png',
            'email' => 'junna@owner.com',
            'password' => bcrypt('123123123'),
        ]);

        $userOwner->assignRole($ownerRole);
    }
}
