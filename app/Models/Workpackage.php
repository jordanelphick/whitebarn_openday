<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Record;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Workpackage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

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
    public function records(): HasMany
    {
        return $this->hasMany(Record::class);
    }
}
