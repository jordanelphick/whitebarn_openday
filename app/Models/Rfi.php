<?php

namespace App\Models;

use App\Models\Workpackage;
use App\Models\Category;
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    /**
     * Get the workpackage that owns the record.
     */
    public function created_by(): BelongsTo
    {
        //dd('jere');
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    /**
     * The users that belong to the role.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }


    public function sender_organisation()
    {
        return $this->belongsTo(Organisation::class, 'sender_organisation_id','id');
    }

    public function receiver_organisation()
    {
        return $this->belongsTo(Organisation::class, 'receiver_organisation_id','id');
    }
    public function next_update_organisation()
    {
        return $this->belongsTo(Organisation::class, 'next_update_organisation_id','id');
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
