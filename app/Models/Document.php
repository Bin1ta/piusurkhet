<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Illuminate\Support\Str;

class Document extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $dates = [
        'published_date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'main_document_category_id',
        'document_category_id',
        'title',
        'title_en',
        'slug',
        'published_date',
        'status',
        'popUp',
        'description',
        'publisher',
        'mark_as_new',
        'title_en',
        'description_en',
        'publisher_en',
        'proposal_status'

    ];

    public function mainDocumentCategory(): BelongsTo
    {
        return $this->belongsTo(DocumentCategory::class, 'main_document_category_id');
    }

    public function documentCategory(): BelongsTo
    {
        return $this->belongsTo(DocumentCategory::class);
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'model');
    }

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'published_date' => $this->published_date,
            'description' => $this->description,
            'publisher' => $this->publisher,
        ];
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }


    public function getPublisherAttribute($value): string
    {
        if (empty($value)) {
            return 'व्यवस्थापक';
        }
        return $value;
    }

    public function getPublisherEnAttribute($value): string
    {
        if (empty($value)) {
            return 'Admin';
        }
        return $value;
    }

    public function proposalForms(): HasMany
    {
        return $this->hasMany(ProposalForm::class);
    }
}
