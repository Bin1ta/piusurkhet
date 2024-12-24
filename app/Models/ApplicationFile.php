<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationFile extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title',
        'file',
        'application_list_id',
        'proposal_form_id',
    ];

    public function applicationList(): HasMany
    {
        return $this->hasMany(ApplicationList::class);
    }

    public function proposalForm(): HasMany
    {
        return $this->hasMany(ProposalForm::class);
    }

}
