<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Workarea;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_number', 'document_name', 'document_revision','comment', 'status', 'date_reviewed', 'date_closed'
    ];

    /**
     * Get the workpackage that owns the record.
     */
    public function workarea(): BelongsTo
    {
        return $this->belongsTo(Workarea::class);
    }


}
