<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Workarea;
use Laravel\Scout\Searchable;

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


}
