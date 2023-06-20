<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Organisation extends Model
{
    use HasFactory;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function organisation_sender() {
        return $this->hasMany(Organisation::class, 'sender_organisation_id');
    }

    public function organisation_receiver() {
        return $this->hasMany(Organisation::class, 'receiver_organisation_id');
    }


}
