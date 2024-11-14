<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Tenant;
use App\Models\TenantUser;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        $customer = Customer::create(
            [
                'name' => 'tenant',
                'email' => 'tenant@gmail.com',
                'password' => 'password'
            ]
        );

        $tenant = Tenant::create([
            'customer_id' => $customer->id,
        ]);

        $tenant->domains()->create([
            'domain' => 'acme.localhost',
        ]);

    }
}
