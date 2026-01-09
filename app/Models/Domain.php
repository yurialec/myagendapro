<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = ['domain', 'tenant_id'];

    public function domains()
    {
        return $this->hasMany(\App\Models\Domain::class, 'tenant_id', 'id');
    }
}
