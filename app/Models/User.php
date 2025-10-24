<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'iduser';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'email',
        'password'
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
     * Get the attributes that should be cast 
     * 
     * @return array<string, string>
     */

    protected function casts():array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // One-to-One: user -> pemilik
    public function pemilik()
    {
        return $this->hasOne(Pemilik::class, 'iduser','iduser');
    }

    // Many-to-Many: user <-> role (pivot role_user)
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user','iduser', 'idrole')
                    ->withPivot('idrole_user', 'status');
    }
}