<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Workarea;

class Workpackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function workarea(): BelongsTo
    {
        return $this->belongsTo(Workarea::class);
    }


}
