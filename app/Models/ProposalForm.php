<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'document_id',
        'is_selected',
    ];
    public function proposalFiles(): HasMany
    {
        return
        $this->hasMany(ApplicationFile::class);
    }

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }



}
