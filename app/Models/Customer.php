<?php

namespace App\Models;

use App\Observers\CustomerObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[ObservedBy([CustomerObserver::class])]
class Customer extends Model
{
    public function tenant(): HasOne
    {
        return $this->hasOne(Tenant::class, 'customer_id');
    }
}
