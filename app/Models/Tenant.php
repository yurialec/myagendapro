<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Contracts\Tenant as TenantContract;
use Stancl\Tenancy\Database\Concerns\CentralConnection;
use Stancl\Tenancy\Tenancy;

class Tenant extends Model implements TenantContract
{
    use CentralConnection;
    protected $fillable = ['id', 'name', 'slug'];

    public function getTenantKey(): string
    {
        return $this->slug;
    }

    public function getTenantKeyName(): string
    {
        return 'slug';
    }

    public function run(callable $callback)
    {
        return tenancy()->run($this, $callback);
    }

    protected array $internal = [];

    public function getInternal(string $key)
    {
        return $this->internal[$key] ?? null;
    }

    public function setInternal(string $key, $value): void
    {
        $this->internal[$key] = $value;
    }

    public function domains()
    {
        return $this->hasMany(\App\Models\Domain::class, 'tenant_id');
    }
}