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
        return $this->hasMany(Workarea::class)->orderBy('number','asc')->orderBy('number_suffix','asc');
    }

    public function hasAnyRfis(){
        return $this->workareas()
            ->whereHas('workpackages.rfis')
            ->exists();
    }

    public function rfis() {
        $rfis = [];
        foreach($this->workareas as $workarea){
            foreach($workarea->workpackages as $workpackage) {
                foreach($workpackage->rfis as $rfi) {
                    $rfis[] = $rfi;
                }

            }
        }
        usort($rfis, function($a, $b) {
            return strcmp($b->sender_index, $a->sender_index);
        });
        return $rfis;

    }


}

