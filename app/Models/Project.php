<?php

namespace App\Models;

use App\Models\Record;
use App\Models\Workarea;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Carbon\Carbon;
use App\Http\Traits\Hashidable;
use Laravel\Scout\Searchable;

class Project extends Model
{
    use HasFactory;
    use Hashidable;
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
     * Get the workpackges for the project.
     */
    public function workareas(): HasMany {
        return $this->hasMany(Workarea::class);
    }

    /**
     * Get the records for the project.
     */
    public function records(): HasManyThrough {
        return $this->hasManyThrough(Record::class, Workarea::class);
    }

    public function latest_updated_record() {
        //return $this->hasManyThrough(Record::class, Workarea::class)->orderBy('updated_at', 'desc')->pluck('date_reviewed')->first();

        return $this->records()->orderBy('updated_at', 'desc')->limit(1);
    }

}

