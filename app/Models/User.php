<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
use App\Models\Privilege;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Searchable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function workpackages(): HasMany
    {
        return $this->hasMany(Workpackage::class,'accountable_id');
    }
    public function records(): BelongsToMany
    {
        return $this->belongsToMany(Record::class);
    }

    /**
     * The privileges that belong to the user.
     */
    public function privileges(): BelongsToMany
    {
        return $this->belongsToMany(Privilege::class)->withPivot('create', 'read', 'update','delete');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function rfis(): HasMany
    {
        return $this->hasMany(Rfi::class);
    }

    public function organisations(): BelongsToMany
    {
        return $this->belongsToMany(Organisation::class);
    }

    public function firstName(){
        return strtok($this->name, " ");
    }
    public function initials() {
        $initials = '';
        if($this->initials_override){
            $initials =$this->initials_override;
        } else {
            foreach (explode(' ', $this->name) as $word)
                $initials .= strtoupper($word[0]);
        }


        return $initials;
    }

}
