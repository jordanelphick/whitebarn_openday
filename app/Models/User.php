<?php

namespace App\Models;

use App\Models\Privilege;
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


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    


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

    /**
     * The rfis that belong to the user.
     */
    public function rfis(): BelongsToMany
    {
        return $this->belongsToMany(Rfi::class)->withPivot('create', 'read', 'update','delete');
    }

    //public function rfis(): HasMany
    //{
    //   return $this->hasMany(Rfi::class);
    //}

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }



    public function organisations(): BelongsToMany
    {
        return $this->belongsToMany(Organisation::class);
    }

    public function firstName(){
        return strtok($this->name, " ");
    }


    public function defaultProfilePhotoUrl()
    {


        $initials = $this->initials();
        $initialsLength = strLen($initials);
        if (strlen($initials) > 2) {
           // dd($initials);
        }

        // Define a list of colors with corresponding hexadecimal codes
        $colors = [
            'bg-red-500' => 'EF4444',
            'bg-green-500' => '10B981',
            'bg-blue-500' => '3B82F6',
            'bg-yellow-500' => 'FCD34D',
            'bg-purple-500' => '8B5CF6',
            'bg-pink-500' => 'EC4899',
            'bg-indigo-500' => '6366F1',
            'bg-teal-500' => '14B8A6',
            'bg-orange-500' => 'F97316',
            'bg-cyan-500' => '22D3EE',
            'bg-gray-500' => '6B7280',
            'bg-amber-500' => 'F59E0B',
            'bg-lime-500' => '84CC16',
            'bg-emerald-500' => '10B981',
            'bg-fuchsia-500' => 'C026D3',
            'bg-rose-500' => 'F43F5E',
            'bg-crimson-500' => 'DC2626',
            'bg-teal-400' => '34D399',
            'bg-amber-400' => 'FBBF24',
            'bg-violet-400' => 'A855F7',
            'bg-yellow-200' => 'FCD34D',
            'bg-pink-300' => 'F472B6',
            'bg-sky-300' => '93C5FD',
            'bg-emerald-300' => '6EE7B7',
        ];


        // Hash the user's name to generate a color index
        $nameHash = md5($this->name);
        $colorIndex = hexdec(substr($nameHash, 0, 6)) % count($colors);
        $color = array_keys($colors)[$colorIndex];
        $hexCode = $colors[$color];


        $fontColor = 'ffffff';


        return 'https://ui-avatars.com/api/?name=' . $initials . '&color=' . $fontColor . '&background=' . $hexCode . '&length=' . $initialsLength . '&uppercase=false';
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
