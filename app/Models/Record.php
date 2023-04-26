<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Workpackage;
use Laravel\Scout\Searchable;


class Record extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'document_number', 'document_name', 'document_revision','comment', 'status', 'date_reviewed', 'date_closed'
    ];


    /**
     * Get the workpackage that owns the record.
     */
    public function workpackage(): BelongsTo
    {
        return $this->belongsTo(Workpackage::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }


    public function getUsersInitials()
    {

        if (count($this->users) > 0) {
            $usersInitials = [];
            foreach ($this->users as $user) {
                $usersInitials[] = $user->initials();
            }
            $usersInitials = implode(", ",$usersInitials);
        } else{
            $usersInitials = '';
        }

        return $usersInitials;
    }

}
