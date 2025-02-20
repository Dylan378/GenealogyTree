<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Distributor extends Model
{
    /** @use HasFactory<\Database\Factories\MaterialFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Parent distributor (the sponsor)
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Distributor::class, 'distributor_id');
    }

    /**
     * Children distributors (left/right leg)
     */
    public function children(): HasMany
    {
        return $this->hasMany(Distributor::class, 'distributor_id');
    }

    /**
     * Recursively load the entire tree
     */
    public function loadTree()
    {
        return $this->load('children')->children->each->loadTree();
    }
}
