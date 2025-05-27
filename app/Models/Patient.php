<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    protected $table = 'patients';
    protected $primaryKey = 'patient_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'patient_id',
        'name',
        'age',
        'gender',
        'email',
        'phone',
    ];

    public function getAuthPassword()
    {
        return '';
    }

    public function getAuthIdentifierName()
    {
        return 'patient_id';
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
