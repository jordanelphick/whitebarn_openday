<?php

namespace App\Models;

use App\Models\Rfi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Message extends Model
{
    use HasFactory;

    /**
     * Get the workpackage that owns the record.
     */
    public function rfi(): BelongsTo
    {
        return $this->belongsTo(Rfi::class);
    }

    /**
     * Get the workpackage that owns the record.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the attachments associated with the message.
     */
    public function attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}
