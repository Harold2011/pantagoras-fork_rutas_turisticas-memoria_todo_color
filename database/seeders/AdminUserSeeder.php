<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
Use App\Models\User;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);
        $role3 = Role::create(['name' => 'artista']);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('asd123')
        ]);
        User::create([
            'name' => 'Usuario',
            'email' => 'user@test.com',
            'password' => bcrypt('asd123')
        ]);
        User::create([
            'name' => 'Artista',
            'email' => 'artista@test.com',
            'password' => bcrypt('asd123')
        ]);
        $user1 = User::find(1);
        $user1->assignRole($role1);

        $user2 = User::find(2);
        $user2->assignRole($role2);

        $user3 = User::find(3);
        $user3->assignRole($role3);
    }
}
