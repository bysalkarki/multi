<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Owner MultiTenant',
            'email' => 'owner@gmail.com',
        ]);

        Customer::create(
            [
                'name' => 'tenant',
                'email' => 'tenant@gmail.com',
                'password' => 'password',
                'domain' => 'tenant' . config('app.domain'),
                'global_id' => Uuid::uuid4(),
            ]
        );
    }
}
