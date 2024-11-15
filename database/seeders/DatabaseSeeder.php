<?php

namespace Database\Seeders;

use App\Enums\UserTypeEnum;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // UserSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'status' => true,
            'email_verified_at' => now(),
        ])->assignRole(Role::findByName(UserTypeEnum::Admin->value));

        User::factory()->create([
            'name' => 'Test Imbestigador',
            'email' => 'test@google.com',
            'status' => true,
            'email_verified_at' => now(),
        ])->assignRole(Role::findByName(UserTypeEnum::Imbestigador->value));
    }
}
