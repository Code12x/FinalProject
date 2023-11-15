<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'intPatientId',
        'intUserId',
        'strFamilyCode',
        'strEmergencyContactPhone',
        'strEmergencyContactRelation',
        'intGroup',
        'dteAdmissionDate',
    ];
}
