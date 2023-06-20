<?php

namespace App\Models;

use App\Models\Workpackage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;


class Rfi extends Model
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

    /**
     * Get the workpackage that owns the record.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }


    public function sender_organisation()
    {
        return $this->belongsTo(Organisation::class, 'sender_organisation_id','id');
    }

    public function receiver_organisation()
    {
        return $this->belongsTo(Organisation::class, 'receiver_organisation_id','id');
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
