<?php

namespace App\Models;

use App\Models\Record;
use App\Models\Workpackage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Carbon\Carbon;
class Project extends Model
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
     * Get the workpackges for the project.
     */
    public function workpackages(): HasMany
    {
        return $this->hasMany(Workpackage::class);
    }

    public function records(): HasManyThrough
    {
        return $this->hasManyThrough(Record::class, Workpackage::class);
    }

    public function last_review_date() {
        return $this->hasManyThrough(Record::class, Workpackage::class)->orderBy('date_reviewed', 'desc')->pluck('date_reviewed')->first();

    }

}
