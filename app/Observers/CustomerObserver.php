<?php

namespace App\Observers;

use App\Models\Customer;
use App\Models\Tenant;
use App\Models\User;

class CustomerObserver
{
    /**
     * Handle the Customer "created" event.
     */
    public function created(Customer $customer): void
    {
        $tenant = Tenant::create([
            'customer_id' => $customer->id,
        ]);

        $tenant->domains()->create([
            'domain' => $customer->domain
        ]);
        $tenant->run(function () use ($customer) {
            User::create(
                [
                    'name' => $customer->name,
                    'email' => $customer->email,
                    'password' => $customer->password,
                    'global_id' => $customer->global_id,
                ]
            );
        });
    }

    /**
     * Handle the Customer "updated" event.
     */
    public function updated(Customer $customer): void
    {
        $tenant = Tenant::find($customer->tenant->id);


        $tenant->run(function () use ($customer) {
            User::where('global_id', $customer->global_id)->update(
                [
                    'name' => $customer->name,
                    'email' => $customer->email,
                ]
            );
        });
    }

    /**
     * Handle the Customer "deleted" event.
     */
    public function deleted(Customer $customer): void
    {
        //
    }
}
