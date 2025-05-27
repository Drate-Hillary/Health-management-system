<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{

    protected $table = 'doctors';
    protected $primaryKey = 'doctor_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'doctor_id',
        'name',
        'profile_image',
        'specialty',
        'email',
        'phone_number'
    ];

    public function getAuthPassword()
    {
        return '';
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id', 'doctor_id');
    }
}
