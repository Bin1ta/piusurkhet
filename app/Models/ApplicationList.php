<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationList extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates=[
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable=[
        'name',
        'phone',
        'email',
        'address',
        'organization_name',
        'organization_address',
    ];
    public function applicationFiles(): HasMany
    {
        return
        $this->hasMany(ApplicationFile::class);
    }
}
