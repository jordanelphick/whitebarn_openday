<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Workarea;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;
use App\Models\Record;

class Workpackage extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name'
    ];

    public function workarea(): BelongsTo
    {
        return $this->belongsTo(Workarea::class);
    }

    /**
     * Get the records for the workpackage.
     */
    public function records(): HasMany
    {
        return $this->hasMany(Record::class);
    }


}
