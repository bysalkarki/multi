<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Contracts\Syncable;
use Stancl\Tenancy\Database\Concerns\ResourceSyncing;

class TenantUser extends Model implements Syncable
{
    use ResourceSyncing;

    protected $guarded = [];
    public $timestamps = false;
    protected $table = 'users';


    public function getGlobalIdentifierKey()
    {
        return $this->getAttribute($this->getGlobalIdentifierKeyName());
    }

    public function getGlobalIdentifierKeyName(): string
    {
        return 'global_id';
    }

    public function getCentralModelName(): string
    {
        return Customer::class;
    }

    public function getSyncedAttributeNames(): array
    {
        return [
            'name',
            'password',
            'email',
        ];
    }
}
