<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'display_name',
        'email',
        'password',
        'role_id',
        'nis',
        'nisn',
        'religion',
        'gender',
        'birth_place',
        'birth_date',
        'phone',
        'address',
        'profile_photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relasi ke tabel roles
     * Setiap user punya 1 role.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Set default role ke "student" kalau belum ada.
     */
    protected static function booted()
    {
        static::creating(function ($user) {
            if (!$user->role_id) {
                $user->role_id = Role::where('name', 'student')->first()?->id;
            }
        });
    }

    public function extracurriculars()
    {
        return $this->belongsToMany(Extracurricular::class)
            ->withPivot('status')
            ->withTimestamps();
    }
    public function roomReservations()
    {
        return $this->hasMany(RoomReservation::class);
    }


}
