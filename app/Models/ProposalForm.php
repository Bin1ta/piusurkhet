<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProposalForm extends Model
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
        'spouse_name',
        'address',
    ];
    public function proposalFiles(): HasMany
    {
        return
        $this->hasMany(ApplicationFile::class);
    }

}
