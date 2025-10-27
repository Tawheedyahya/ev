<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Venue;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function booking(){
        return $this->hasMany(Booking::class,'user_id');
    }
    public function venue(){
        return $this->belongsToMany(Venue::class,'bookings','user_id','venue_id')->withPivot(['name','email','phone','status','notes','order_date','upto_date']);
    }
    public function hearts(){
        return $this->belongsToMany(Venue::class,'hearts','user_id','venue_id')->withPivot('category')->withTimestamps();
    }
    public function likedProfessionals(){
    // change table name if you used a custom one
    return $this->belongsToMany(Professional::class, 'professionllikes', 'user_id', 'professional_id')
                ->withTimestamps();
    }
}
