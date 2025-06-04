<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\Purchase;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'user_type',  // Make sure this field exists in your DB (e.g., 'admin' or 'user')
        'email',
        'password',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [ // fixed method to property
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relationship: User has many purchases
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    // Check if user is admin
    public function isAdmin()
    {
        return $this->user_type === 'admin';
    }
}
