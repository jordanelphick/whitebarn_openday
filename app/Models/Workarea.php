<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Workpackage;
use App\Models\Check;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Workarea extends Model
{
    use HasFactory;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];
    /**
     * The name of the parent model that should have its updated_at field updated when this model calls ->save()
     *
     * @var array<int, string>
     */
    protected $touches = ['project'];

    /**
     * Get the workpackage that owns the record.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
    /**
     * Get the records for the workpackage.
     */
    public function workpackages(): HasMany
    {
        return $this->hasMany(Workpackage::class)->orderBy('number','asc');
    }


}
