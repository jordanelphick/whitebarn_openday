<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Workarea;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;
use App\Models\Record;
use App\Models\User;

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

    public function user(): HasOne
    {
        return $this->HasOne(User::class,'id','accountable_id');
    }

}
