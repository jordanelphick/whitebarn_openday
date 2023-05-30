<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Check extends Model
{
    use HasFactory;

    /**
     * Get the workpackage that owns the record.
     */
    public function workpackage(): BelongsTo
    {
        return $this->belongsTo(Workpackage::class);
    }
}
