<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    /**
     * Get the parent model that owns the attachment.
     */
    public function attachable(): MorphTo
    {
        return $this->morphTo();
    }

}
